<!-- app/View/Users/dashboard.ctp -->

<h2>User Profile</h2>

<div class="d-flex mt-4">
    <div>
        <?php
            $imageUrl = !empty($userData['UserProfile']['image']) ?
                '/img/profiles/'.$userData['UserProfile']['image'] :
                '/img/profiles/no-image.png';

            echo $this->Html->image($imageUrl, array(
                'width' => '200',
            ));
        ?>
    </div>
    <div class="d-flex flex-column ml-5">
            <h5>
                <?php echo $userData['UserProfile']['name'] ?>
                    &nbsp;
                <!-- <?php echo $userData['UserProfile']['age'] ?> -->
            </h5>
            <p>Gender: <?php echo $userData['UserProfile']['gender'] ?></p>
            <p>Birthdate: <?php echo $userData['UserProfile']['birthdate'] !== '0000-00-00 00:00:00' ? date("F j, Y", strtotime($userData['UserProfile']['birthdate'])) : 'NA' ?></p>
            <p>Joined: <?php echo date("F j, Y", strtotime($userData['created_at'])) ?></p>
            <p>Last Login: <?php echo $userData['last_login_at'] !== '0000-00-00 00:00:00' ? date("F j, Y", strtotime($userData['last_login_at'])) : 'NA' ?></p>
    </div>
</div>

<div class="mt-3">
    <label>Hubby:</label>
    <p>
        <?php echo $userData['UserProfile']['hubby'] ?>
    </p>
</div>

<div class="action-btn mt-5">
    <?php 
        echo $this->Html->link('Edit Account Profile', 
            array('controller' => 'userProfiles', 'action' => 'edit'), 
            array('class' => 'btn btn-primary')
        );
        echo $this->Html->link('Change Account Email', 
            array('controller' => 'users', 'action' => 'changeEmail'), 
            array('class' => 'btn btn-info ml-3')
        );
        echo $this->Html->link('Change Account Password', 
            array('controller' => 'users', 'action' => 'changePassword'), 
            array('class' => 'btn btn-info ml-3')
        );
    ?>
</div>