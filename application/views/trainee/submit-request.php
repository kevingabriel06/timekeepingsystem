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
													<h4 class="text-dark">Create Request</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
								<div class="card-body">
									<div class="flex-column list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
										<a class="list-group-item list-group-item-action active" id="v-pills-edit-tab" data-toggle="pill" href="#v-pills-edit" role="tab" aria-controls="v-pills-edit" aria-selected="true">Request Edit Log</a>
										<a class="list-group-item list-group-item-action" id="v-pills-add-tab" data-toggle="pill" href="#v-pills-add" role="tab" aria-controls="v-pills-add" aria-selected="false">Request Add Log</a>
									</div>
								</div>
							</div>

						</aside>
					</div>

					<div class="col-xl-9 col-lg-8 col-md-12">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
								<form>
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h5 class="card-title mb-0">Request Edit Log</h5>
										</div>

										<div class="card-body">
											<!-- Select Date -->
											<div class="mb-4">
												<label for="selectDate" class="form-label fw-semibold">Select Date</label>
												<input type="date" id="selectDate" class="form-control" autocomplete="off">
											</div>

											<!-- Current Log Section -->
											<div class="mb-4">
												<h6 class="fw-bold mb-3">Current Log</h6>
												<div class="row g-3">
													<div class="col-md-6">
														<label for="loginDropdown" class="form-label">Login Time</label>
														<select id="loginDropdown" class="form-select">
															<option value="">-- Select Login Time --</option>
														</select>
													</div>
													<div class="col-md-6">
														<label for="logoutDropdown" class="form-label">Logout Time</label>
														<select id="logoutDropdown" class="form-select">
															<option value="">-- Select Logout Time --</option>
														</select>
													</div>
												</div>
											</div>

											<!-- Request Log Section -->
											<div class="mb-4">
												<h6 class="fw-bold mb-3">Request Log</h6>
												<div class="row g-3">
													<div class="col-md-6">
														<label for="loginTime" class="form-label">Login Time</label>
														<input type="datetime-local" id="loginTime" class="form-control" placeholder="Select login time">
													</div>
													<div class="col-md-6">
														<label for="logoutTime" class="form-label">Logout Time</label>
														<input type="datetime-local" id="logoutTime" class="form-control" placeholder="Select logout time">
													</div>
												</div>
											</div>

											<!-- Log ID Display -->
											<div id="logIdDisplay" class="text-muted small mt-2"></div>
										</div>
									</div>

									<script>
										const timelogs = <?= json_encode($timelogs); ?>;

										document.addEventListener('DOMContentLoaded', function() {
											const loginDropdown = document.getElementById('loginDropdown');
											const logoutDropdown = document.getElementById('logoutDropdown');
											const logIdDisplay = document.getElementById('logIdDisplay');
											const selectDateInput = document.getElementById('selectDate');

											selectDateInput.addEventListener('change', function() {
												const selectedDate = this.value;

												// Reset fields
												loginDropdown.innerHTML = '<option value="">-- Select Login Time --</option>';
												logoutDropdown.innerHTML = '<option value="">-- Select Logout Time --</option>';
												logIdDisplay.textContent = '';

												if (!selectedDate) return;

												const matchedLogs = timelogs.filter(log => {
													const loginDate = log.LogInTime?.substring(0, 10);
													const logoutDate = log.LogOutTime?.substring(0, 10);
													return loginDate === selectedDate || logoutDate === selectedDate;
												});

												if (matchedLogs.length === 0) {
													alert('No time logs found for this date.');
													return;
												}

												matchedLogs.forEach(log => {
													if (log.LogInTime) {
														const opt = document.createElement('option');
														opt.value = log.LogInTime;
														opt.textContent = log.LogInTime;
														opt.dataset.id = log.LogID;
														loginDropdown.appendChild(opt);
													}

													if (log.LogOutTime) {
														const opt = document.createElement('option');
														opt.value = log.LogOutTime;
														opt.textContent = log.LogOutTime;
														opt.dataset.id = log.LogID;
														logoutDropdown.appendChild(opt);
													}
												});

												const firstLog = matchedLogs[0];
												statusDisplay.textContent = firstLog.Status || 'N/A';
												overtimeDisplay.textContent = firstLog.OvertimeHours || '0';
											});

											function syncDropdowns(sourceDropdown, targetDropdown) {
												sourceDropdown.addEventListener('change', function() {
													const selectedId = this.selectedOptions[0]?.dataset.id;
													logIdDisplay.textContent = selectedId ? 'Log ID: ' + selectedId : '';

													if (!selectedId) return;

													// Find matching option in the target dropdown
													for (const option of targetDropdown.options) {
														if (option.dataset.id === selectedId) {
															targetDropdown.value = option.value;
															break;
														}
													}
												});
											}

											syncDropdowns(loginDropdown, logoutDropdown);
											syncDropdowns(logoutDropdown, loginDropdown);
										});
									</script>

									<div class="row">
										<div class="col-12">
											<div class="submit-section text-center btn-add">
												<button class="btn btn-theme text-white ctm-border-radius button-1">Save</button>
												<button class="btn btn-danger text-white ctm-border-radius">Cancel</button>
											</div>
										</div>
									</div>
								</form>

								<script>
									document.querySelector('.btn-add .btn-theme').addEventListener('click', function(e) {
										e.preventDefault();

										const logIDText = document.getElementById('logIdDisplay').textContent;
										const logID = logIDText.replace('Log ID: ', '').trim();
										const loginTime = document.getElementById('loginTime').value;
										const logoutTime = document.getElementById('logoutTime').value;

										if (!logID || !loginTime || !logoutTime) {
											alert("Please complete all required fields.");
											return;
										}

										const formData = new FormData();
										formData.append('log_id', logID);
										formData.append('login_time', loginTime);
										formData.append('logout_time', logoutTime);

										fetch('<?= base_url("logrequest/update_request") ?>', {
												method: 'POST',
												body: formData
											})
											.then(response => response.json())
											.then(data => {
												alert(data.message);
												if (data.status === 'success') {
													location.reload();
												}
											})
											.catch(error => {
												console.error('Error:', error);
											});
									});
								</script>

							</div>

							<div class="tab-pane fade" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-add-tab">
								<form>
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h5 class="card-title mb-0">Request Add Log</h5>
										</div>

										<div class="card-body">
											<!-- Request Log Section -->
											<div class="mb-4">
												<h6 class="fw-bold mb-3">Request Log</h6>
												<div class="row g-3">
													<div class="col-md-6">
														<label for="loginTime" class="form-label">Login Time</label>
														<input type="datetime-local" id="loginTime" class="form-control" placeholder="Select login time">
													</div>
													<div class="col-md-6">
														<label for="logoutTime" class="form-label">Logout Time</label>
														<input type="datetime-local" id="logoutTime" class="form-control" placeholder="Select logout time">
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<div class="submit-section text-center btn-add">
												<button class="btn btn-theme text-white ctm-border-radius button-1">Save</button>
												<button class="btn btn-danger text-white ctm-border-radius">Cancel</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Content-->