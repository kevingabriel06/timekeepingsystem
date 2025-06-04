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
                                                <li class="breadcrumb-item d-inline-block"><a href="<?php echo site_url('trainee/dashboard'); ?>" class="text-dark">Home</a></li>
                                                <li class="breadcrumb-item d-inline-block active">Request</li>
                                            </ol>
                                            <h4 class="text-dark">Request</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card ctm-border-radius shadow-sm">
                        <div class="card-body">
                            <a href="create-review.html" class="btn btn-theme button-1 ctm-border-radius text-white btn-block"><span><i class="fa fa-plus"></i></span> Create Review</a>
                        </div>
                    </div>
                    <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
                        <div class="card-body">
                            <div class="flex-column list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Overtime Request</a>
                                <a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Log Request</a>

                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-8  col-md-12">
                <div class="card shadow-sm ctm-border-radius">
                    <div class="card-body align-center">
                        <div class="tab-content" id="v-pills-tabContent">

                            <!-- Tab1-->
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table class="table custom-table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Review Name</th>
                                                    <th>Reviewers</th>
                                                    <th>Begin On</th>
                                                    <th>Due By</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Monthly Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>15 Dec 2019</td>
                                                    <td>17 Dec 2019</td>
                                                    <td>
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"> In Progress</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"> Completed</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>15 Dec 2019</td>
                                                    <td>17 Dec 2019</td>
                                                    <td>
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"> In Progress</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"> Completed</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>15 Dec 2019</td>
                                                    <td>17 Dec 2019</td>
                                                    <td>
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"> In Progress</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"> Completed</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>15 Dec 2019</td>
                                                    <td>17 Dec 2019</td>
                                                    <td>
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"> In Progress</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"> Completed</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>15 Dec 2019</td>
                                                    <td>17 Dec 2019</td>
                                                    <td>
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> In Progress <i class="caret"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"> In Progress</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"> Completed</a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/Tab 1-->

                            <!-- Tab2-->
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table class="table custom-table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Created By</th>
                                                    <th>Scheduled For</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Monthly Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>
                                                        Everyone
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>
                                                        Everyone
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>
                                                        Everyone
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>
                                                        Everyone
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employees Review</td>
                                                    <td>
                                                        <a href="employment.html" class="avatar"><img class="img-fluid" alt="avatar image" src="assets/img/profiles/img-10.jpg"></a>
                                                        <h2><a href="employment.html"> Richard Wilson</a></h2>
                                                    </td>
                                                    <td>
                                                        Everyone
                                                    </td>
                                                    <td>
                                                        <div class="table-action">
                                                            <a href="edit-review.html" class="btn btn-sm btn-outline-success">
                                                                <span class="lnr lnr-pencil"></span> Edit
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                <span class="lnr lnr-trash"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /Tab 2-->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--/Content-->