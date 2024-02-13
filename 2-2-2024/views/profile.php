
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
		.close {
    position: absolute;
    top: 0px;
    background: red;
    right: 0px;
    width: 32px;
    text-align: center;
    border-radius: 2px 5px 2px 2px;
    font-size: 20px;
    cursor: pointer;
}
#myModal{
	display: none;
    padding: 5px;
    top: 116px;
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
            <a id="openSupportModel" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal"><?= lang('edit'); ?></a>
        </div>
    </div>
</div>

<?php if($this->session->userdata('type')=='users'){ 
				$url = base_url('home/edit_profile');
			 }elseif($this->session->userdata('type')=='provider'  && $this->session->userdata('subtype') !='employee'){ 
				$url = base_url('provider/edit_profile');
			 } elseif($this->session->userdata('type')=='affiliator'){ 
				$url = base_url('affiliator/edit_profile');
			 }elseif($this->session->userdata('type') == 'provider' && $this->session->userdata('subtype') =='employee'){
				$url = base_url('employee/edit_profile');
			 } ?>

<div id="myModal" class="modal" >
	<div class="modal-content" style="padding: 15px;">
		<span class="close" onclick="closeModal()">&times;</span>
		<h4 class="model_head"><?= lang('edit'); ?></h4>
		<form action="<?= $url ?>" method="post" id="editProfileForm">
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
                    <button type="button" onclick="closeModal()" class="btn btn-secondary" data-bs-dismiss="modal"><?= lang('close'); ?></button>
                    <button type="submit" class="btn btn-primary"><?= lang('save_changes'); ?></button>
                </div>
            </form>
	</div>
</div>
<script>
	$("#openSupportModel").click(function(){
		console.log("open");
		$('#myModal').css('display', 'block');
	});

    function closeModal() {
        $('#myModal').css('display', 'none');
    }
</script>



