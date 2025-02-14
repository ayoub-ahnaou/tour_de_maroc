<?php



use TourDeMaroc\App\models\VirtualTeamModel;  
use TourDeMaroc\App\models\VirtualTeamCyclistModel; 
use TourDeMaroc\App\libraries\Controller; 



class VirtualTeamController extends Controller
{
    private VirtualTeamModel $virtualTeamModel;
    private VirtualTeamCyclistModel $virtualTeamCyclistModel;

    public function __construct()
    {
        

        $this->virtualTeamModel = new VirtualTeamModel();
        $this->virtualTeamCyclistModel = new VirtualTeamCyclistModel();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $teamName = filter_input(INPUT_POST, 'team_name', FILTER_SANITIZE_STRING);
            $fanId = $_SESSION['utilisateur_id'] ?? null;

            if (empty($teamName)) {
                $data['error'] = "Team name is required.";
                $this->view('virtualteam/create', $data);
                return;
            }

            if (!$fanId) {
                echo "Error: Fan ID not found. User must be logged in.";
                return;
            }

            if ($this->virtualTeamModel->createVirtualTeam($fanId, $teamName)) {
                header('Location: ' . URL_ROOT . '/virtualteam/myteams');
                exit();
            } else {
                $data['error'] = "Error creating team. Please try again.";
                $this->view('virtualteam/create', $data);
            }
        } else {
            $this->view('virtualteam/create');
        }
    }

    public function myTeams()
    {
        $fanId = $_SESSION['utilisateur_id'] ?? null;

        if (!$fanId) {
            echo "Error: Fan ID not found. User must be logged in to view teams.";
            return;
        }

        $virtualTeams = $this->virtualTeamModel->getVirtualTeamsByFanId($fanId);

        $data['virtualTeams'] = $virtualTeams;
        $this->view('virtualteam/myteams', $data);
    }

    public function addCyclist()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $virtualTeamId = filter_input(INPUT_POST, 'virtual_team_id', FILTER_VALIDATE_INT);
            $cyclistId = filter_input(INPUT_POST, 'cyclist_id', FILTER_VALIDATE_INT);

            if ($virtualTeamId === false || $cyclistId === false) {
                echo "Error: Invalid team ID or cyclist ID.";
                return;
            }

            if ($this->virtualTeamCyclistModel->addCyclistToTeam($virtualTeamId, $cyclistId)) {
                header('Location: ' . URL_ROOT . '/virtualteam/detail/' . $virtualTeamId);
                exit();
            } else {
                echo "Error adding cyclist to team. Please try again.";
            }
        } else {
            echo "Error: Invalid request method.";
        }
    }

    public function detail(int $teamId)
    {
        $virtualTeam = $this->virtualTeamModel->getVirtualTeamById($teamId);
        $cyclistsInTeam = $this->virtualTeamCyclistModel->getCyclistsInTeam($teamId);

        if ($virtualTeam) {
            $data['virtualTeam'] = $virtualTeam;
            $data['cyclists'] = $cyclistsInTeam;
            $this->view('virtualteam/detail', $data);
        } else {
            echo "Virtual team not found.";
        }
    }
}