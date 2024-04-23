<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup()
    {
        $backupTime = '01:00';
        return view('backup', compact('backupTime'));
    }

    public function update(Request $req){
        $req->validate([
            'backup_time' => 'required',
        ]);
        $time = $req->input('backup_time');
        return redirect()->back()->with('success', 'Backup time has been updated.');
    }

    public function downloadBackup(Request $req){
        $path = $req->download_path;
    }
}
