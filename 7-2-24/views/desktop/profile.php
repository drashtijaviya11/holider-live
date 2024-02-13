
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin: 0;
        }

        .profile-info p {
            margin: 5px 0;
            color: #777;
        }

        .profile-info a {
            color: #fff;
            text-decoration: none;
        }

        .profile-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <div class="profile-picture">
            <!-- Include user profile picture here -->
            <!-- <img src="profile-picture.jpg" alt="Profile Picture"> -->
        </div>

        <div class="profile-info">
            <h2><?= $userDetail['name']; ?></h2>
            <p><?= lang('email'); ?>: <?= $userDetail['email']; ?> </p>
            <p><?= lang('phone'); ?>: <?= $userDetail['phone']; ?></p>
            <!-- <p>State: California</p>
            <p>Country: United States</p> -->

            <!-- "Edit Profile" link to open modal -->
            <p><a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal"><?= lang('edit'); ?></a></p>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js (Optional, for Bootstrap features) -->
<!-- <script src="https://cdn.jsdelivr.net//'npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<?php if($this->session->userdata('type')=='users'){ 
				$url = base_url('home/edit_profile');
			 }elseif($this->session->userdata('type')=='provider'  && $this->session->userdata('subtype') !='employee'){ 
				$url = base_url('provider/edit_profile');
			 } elseif($this->session->userdata('type')=='affiliator'){ 
				$url = base_url('affiliator/edit_profile');
			 }elseif($this->session->userdata('type') == 'provider' && $this->session->userdata('subtype') =='employee'){
				$url = base_url('employee/edit_profile');
			 } ?>
<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="<?= $url ?>" method="post" id="editProfileForm">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileModalLabel"><?= lang('edit'); ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="editName" class="form-label"><?= lang('name'); ?></label>
						<input type="text" class="form-control" id="editName" name="editName" value="<?= $userDetail['name']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="editEmail" class="form-label"><?= lang('email'); ?></label>
						<input type="email" class="form-control" id="editEmail" name="editEmail" value="<?= $userDetail['email']; ?>" required>
					</div>
					<div class="mb-3">
						<label for="editPhone" class="form-label"><?= lang('phone'); ?></label>
						<input type="tel" class="form-control" id="editPhone" name="editPhone" value="<?= $userDetail['phone']; ?>" disabled>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('close'); ?></button>
					<button type="submit" class="btn btn-primary"><?php echo lang('save_changes'); ?></button>
				</div>
			</form>
        </div>
    </div>
</div>

