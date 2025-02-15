<?php

use TourDeMaroc\App\models\VirtualTeamModel;  
use TourDeMaroc\App\models\VirtualTeamCyclistModel; 
use TourDeMaroc\App\models\users;
use TourDeMaroc\App\libraries\Controller; 

class VirtualTeamController extends Controller
{
    private VirtualTeamModel $virtualTeamModel;
    private VirtualTeamCyclistModel $virtualTeamCyclistModel;
    private users $userModel;

    public function __construct()
    {
        $this->virtualTeamModel = new VirtualTeamModel();
        $this->virtualTeamCyclistModel = new VirtualTeamCyclistModel();
        $this->userModel = new users();
    }

    public function myTeams()
    {
        $fanId = $_SESSION['utilisateur_id'] ?? null;

        if (!$fanId) {
            echo "Error: Fan ID not found. User must be logged in to view teams.";
            return;
        }

        $virtualTeams = $this->virtualTeamModel->getVirtualTeamsByFanId($fanId);
        
        // Get the user data
        $userData = $this->userModel->GetUserById($fanId);
        
        $data = [
            'virtualTeams' => $virtualTeams,
            'username' => $userData['nom_utilisateur'] ?? 'Unknown User'
        ];
        
        $this->view('virtualteam/myteams', $data);
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

    public function addCyclist()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'virtual_team_id' => $_POST['virtual_team_id'],
            'cyclist_name' => trim($_POST['cyclist_name'])
        ];

        // Get cyclist ID from name
        $cyclist = $this->virtualTeamCyclistModel->getCyclistByName($data['cyclist_name']);
        
        if (!$cyclist) {
            flash('virtual_team_message', 'Cycliste non trouvé', 'alert alert-danger');
            redirect('virtualteam/detail/' . $data['virtual_team_id']);
        }

        if ($this->virtualTeamCyclistModel->addCyclistToTeam($data['virtual_team_id'], $cyclist->utilisateur_id)) {
            flash('virtual_team_message', 'Cycliste ajouté avec succès', 'alert alert-success');
            redirect('virtualteam/detail/' . $data['virtual_team_id']);
        } else {
            flash('virtual_team_message', 'Erreur lors de l\'ajout du cycliste', 'alert alert-danger');
            redirect('virtualteam/detail/' . $data['virtual_team_id']);
        }
    }
}

public function searchCyclists($term = '')
{
    if (empty($term)) {
        echo json_encode([]);
        return;
    }

    $cyclists = $this->virtualTeamCyclistModel->searchCyclists($term);
    echo json_encode($cyclists);
}
}