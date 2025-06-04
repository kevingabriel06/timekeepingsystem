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
	                                                <li class="breadcrumb-item d-inline-block active">Attendance Summary</li>
	                                            </ol>
	                                            <h4 class="text-dark">Atttendance Summary</h4>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="card ctm-border-radius shadow-sm">
	                        <div class="card-body">
	                            <a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
	                        </div>
	                    </div>
	                    <div class="card ctm-border-radius shadow-sm">
	                        <div class="card-body">
	                            <h4 class="card-title">Drag & Drop Event</h4>
	                            <div id="calendar-events" class="mb-3">
	                                <div class="calendar-events" data-class="bg-info"><i class="fa fa-star text-primary"></i> Team Member Meet</div>
	                                <div class="calendar-events" data-class="bg-success"><i class="fa fa-star text-success"></i> Employee Review</div>
	                                <div class="calendar-events" data-class="bg-danger"><i class="fa fa-star text-danger"></i> Team Lead Meet</div>
	                                <div class="calendar-events" data-class="bg-warning"><i class="fa fa-star text-warning"></i> Office Day Funtion</div>
	                            </div>
	                            <div class="checkbox  mb-3">
	                                <input id="drop-remove" type="checkbox">
	                                <label for="drop-remove">
	                                    Remove after drop
	                                </label>
	                            </div>
	                            <a href="javascript:void(0)" data-toggle="modal" data-target="#add_new_event" class="btn mb-3 btn-theme text-white ctm-border-radius btn-block button-1">
	                                <i class="fa fa-plus"></i> Add Category
	                            </a>
	                        </div>
	                    </div>
	                </aside>
	            </div>

	            <div class="col-xl-9 col-lg-8  col-md-12">
	                <div class="card ctm-border-radius shadow-sm">
	                    <div class="card-body">
	                        <div id="calendar"></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!--/Content-->