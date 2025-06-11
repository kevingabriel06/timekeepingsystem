<!-- Content -->
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="card ctm-border-radius shadow-sm">
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-md-12 mr-auto text-left">
                                    <div class="custom-search input-group">
                                        <div class="custom-breadcrumb">
                                            <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                <li class="breadcrumb-item d-inline-block"><a href="<?php echo site_url('hr/dashboard'); ?>" class="text-dark">Home</a></li>
                                                <li class="breadcrumb-item d-inline-block active">Manage Trainees</li>
                                            </ol>
                                            <h4 class="text-dark">Trainees</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item text-center button-6"><a href="<?php echo site_url('hr/manage-users'); ?>" class="text-dark">All Users</a></li>
                                <li class="list-group-item text-center button-6"><a class="text-dark" href="<?php echo site_url('hr/manage-supervisor'); ?>">Supervisor</a></li>
                                <li class="list-group-item text-center active button-5"><a class="text-white" href="<?php echo site_url('hr/manage-trainees'); ?>">Trainees</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="card shadow-sm ctm-border-radius">
                    <div class="card-body align-center">
                        <h4 class="card-title float-left mb-0 mt-2">Manage Trainees</h4>
                        <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                            <li class="nav-item pl-3">
                                <a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius p-2 text-white float-right" data-toggle="modal" data-target="#addTrainee"><i class="fa fa-plus"></i> Add Trainee</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card ctm-border-radius shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>School</th>
                                                <th>Supervisor</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($trainees) && !empty($trainees)): ?>
                                                <?php foreach($trainees as $trainee): ?>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0)" class="avatar">
                                                            <img src="<?php echo base_url('assets/img/profiles/default.jpg'); ?>" alt="<?php echo $trainee->name; ?>" class="img-fluid">
                                                        </a>
                                                        <h2><a href="javascript:void(0)"><?php echo $trainee->name; ?></a></h2>
                                                    </td>
                                                    <td><?php echo $trainee->department_name; ?></td>
                                                    <td><?php echo $trainee->school; ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-success btn-sm"><?php echo $trainee->supervisor_name; ?></a>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a href="javascript:void(0)" class="btn <?php echo ($trainee->status == 'active') ? 'btn-success' : 'btn-danger'; ?> btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                <?php echo ucfirst($trainee->status); ?> <i class="caret"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="updateTraineeStatus(<?php echo $trainee->id; ?>, 'active')">Active</a>
                                                                <a class="dropdown-item" href="javascript:void(0)" onclick="updateTraineeStatus(<?php echo $trainee->id; ?>, 'inactive')">Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#editTrainee<?php echo $trainee->id; ?>">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" onclick="deleteTrainee(<?php echo $trainee->id; ?>)">
                                                                <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">No trainees found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Trainee Modal -->
<div class="modal fade" id="addTrainee" tabindex="-1" role="dialog" aria-labelledby="addTraineeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTraineeLabel">Add New Trainee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('hr/add_trainee'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Department <span class="text-danger">*</span></label>
                        <select class="form-control" name="department_id" required>
                            <option value="">Select Department</option>
                            <?php foreach($departments as $dept): ?>
                                <option value="<?php echo $dept->id; ?>"><?php echo $dept->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small><a href="javascript:void(0)" data-toggle="modal" data-target="#addDepartment">+ Add New Department</a></small>
                    </div>
                    <div class="form-group">
                        <label>School <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="school" required>
                    </div>
                    <div class="form-group">
                        <label>Supervisor <span class="text-danger">*</span></label>
                        <select class="form-control" name="supervisor_id" required>
                            <option value="">Select Supervisor</option>
                            <?php foreach($supervisors as $supervisor): ?>
                                <option value="<?php echo $supervisor->id; ?>"><?php echo $supervisor->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Trainee</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="addDepartmentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentLabel">Add New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('hr/add_department'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Department Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="department_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Trainee Modal Template (Will be duplicated for each trainee) -->
<?php if(isset($trainees) && !empty($trainees)): ?>
    <?php foreach($trainees as $trainee): ?>
    <div class="modal fade" id="editTrainee<?php echo $trainee->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editTraineeLabel<?php echo $trainee->id; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTraineeLabel<?php echo $trainee->id; ?>">Edit Trainee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('hr/update_trainee/'.$trainee->id); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo $trainee->name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Department <span class="text-danger">*</span></label>
                            <select class="form-control" name="department_id" required>
                                <?php foreach($departments as $dept): ?>
                                    <option value="<?php echo $dept->id; ?>" <?php echo ($dept->id == $trainee->department_id) ? 'selected' : ''; ?>>
                                        <?php echo $dept->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>School <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="school" value="<?php echo $trainee->school; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Supervisor <span class="text-danger">*</span></label>
                            <select class="form-control" name="supervisor_id" required>
                                <?php foreach($supervisors as $supervisor): ?>
                                    <option value="<?php echo $supervisor->id; ?>" <?php echo ($supervisor->id == $trainee->supervisor_id) ? 'selected' : ''; ?>>
                                        <?php echo $supervisor->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Trainee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<script>
function deleteTrainee(id) {
    if(confirm('Are you sure you want to delete this trainee?')) {
        window.location.href = '<?php echo site_url("hr/delete_trainee/"); ?>' + id;
    }
}

function updateTraineeStatus(id, status) {
    if(confirm('Are you sure you want to update the status?')) {
        window.location.href = '<?php echo site_url("hr/update_trainee_status/"); ?>' + id + '/' + status;
    }
}
</script>