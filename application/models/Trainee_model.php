<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainee_model extends CI_Model
{

    public function get_login_user()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('UserID', $this->session->userdata('UserID'));

        $query = $this->db->get();

        return $query->row();
    }

    public function get_active_timelog($userId)
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');

        $this->db->select('tl.*');
        $this->db->from('timelogs tl');
        $this->db->join('trainees t', 't.TraineeID = tl.TraineeID');
        $this->db->where('t.UserID', $userId);
        $this->db->where('tl.LogInTime <=', $now);
        $this->db->group_start()
            ->where('tl.LogOutTime >=', $now)
            ->or_where('tl.LogOutTime IS NULL', null, false)
            ->group_end();

        $query = $this->db->get();
        return $query->result();
    }

    public function clock_in($userId)
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');
        $nowDate = date('Y-m-d');

        // First, get the TraineeID associated with the UserID
        $this->db->select('TraineeID');
        $this->db->from('trainees');
        $this->db->where('UserID', $userId);
        $query = $this->db->get();

        if ($query->num_rows() === 0) {
            return false; // No trainee found
        }

        $trainee = $query->row();

        $data = [
            'TraineeID' => $trainee->TraineeID,
            'LogInTime' => $now,
            'Date' => $nowDate
        ];

        // Insert new clock-in record
        return $this->db->insert('timelogs', $data);
    }

    public function clock_out($userId)
    {
        date_default_timezone_set('Asia/Manila');
        $now = date('Y-m-d H:i:s');

        // Get TraineeID associated with UserID
        $this->db->select('TraineeID');
        $this->db->from('trainees');
        $this->db->where('UserID', $userId);
        $query = $this->db->get();

        if ($query->num_rows() === 0) {
            return false; // No trainee found
        }

        $trainee = $query->row();

        // Find the latest timelog record with no LogOutTime (clocked in but not clocked out)
        $this->db->where('TraineeID', $trainee->TraineeID);
        $this->db->where('LogOutTime IS NULL', null, false); // where LogOutTime IS NULL
        $this->db->order_by('LogInTime', 'DESC');
        $this->db->limit(1);
        $timelog = $this->db->get('timelogs')->row();

        if (!$timelog) {
            // No active clock-in record found to clock out from
            return false;
        }

        // Calculate duration in seconds between LogInTime and now (clock-out time)
        $logInTimestamp = strtotime($timelog->LogInTime);
        $logOutTimestamp = strtotime($now);
        $durationSeconds = $logOutTimestamp - $logInTimestamp;

        // Define 8 hours in seconds
        $eightHoursSeconds = 8 * 60 * 60;

        // Calculate regular and overtime seconds
        $regularSeconds = min($durationSeconds, $eightHoursSeconds);
        $overtimeSeconds = max(0, $durationSeconds - $eightHoursSeconds);

        // Convert seconds to hours (decimal format)
        $regularHours = round($regularSeconds / 3600, 2);
        $overtimeHours = round($overtimeSeconds / 3600, 2);

        // Set status to 'overtime' if overtime exists, else ''
        $status = $overtimeHours > 0 ? 'Overtime' : '';

        // Prepare update data
        $updateData = [
            'LogOutTime' => $now,
            'OvertimeHours' => $overtimeHours,
            'Status' => $status  // assuming you have a Status column in your timelogs table
        ];

        // Update the record with LogOutTime, RegularHours, OvertimeHours, and Status
        $this->db->where('LogID', $timelog->LogID);
        return $this->db->update('timelogs', $updateData);
    }



    public function get_time_logs()
    {
        $userID = $this->session->userdata('UserID');

        if (!$userID) {
            return []; // or return false;
        }

        $this->db->select('timelogs.LogID, timelogs.LogInTime, timelogs.LogOutTime, timelogs.OvertimeHours, timelogs.Status');
        $this->db->from('timelogs');
        $this->db->join('trainees', 'trainees.TraineeID = timelogs.TraineeID');
        $this->db->join('users', 'users.UserID = trainees.UserID');
        $this->db->where('users.UserID', $userID);

        $query = $this->db->get();
        return $query->result(); // Return all logs, not just one
    }

    public function update_log($log_id, $login_time, $logout_time)
    {
        $trainee_id = TraineeID
        $data = [
            'TraineeID'
            'OriginalLogID' => $log_id,
            'LogInTime' => $login_time,
            'LogOutTime' => $logout_time,
            'RequestStatus' => 'Pending' // Optional: add request flag
        ];

        $this->db->where('LogID', $log_id);
        return $this->db->update('logcorrectionrequests', $data);
    }
}
