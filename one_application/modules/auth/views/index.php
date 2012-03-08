	<section>
        <header class="container_12 clearfix">
            <div class="grid_12">
                <h1>List of Users </h1>
            </div>
        </header>
        <section class="container_12 clearfix">
            <div class="grid_12">
                <div id="demo" class="clearfix"> 
                    <table class="display" id="example"> 
                        <thead> 
                            <tr> 
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Groups</th>
                                <th>Status</th>
                                <th>Action</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php foreach ($users as $user):?>
                            <tr>
                                <td><?php echo $user->first_name;?></td>
                                <td><?php echo $user->last_name;?></td>
                                <td><?php echo $user->email;?></td>
                                <td>
                                    <?php foreach ($user->groups as $group):?>
                                        <?php echo $group->name;?><br />
                                    <?php endforeach?>
                                </td>
                                <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
                                <td> <a href="#">Edit</a> &bull; <a href="#">Remove</a> </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody> 
                    </table> 
                </div>
            </div>
        </section>

        <div class="clear"></div>
                
        <section class="tabs leading container_12">
            <ul class="clearfix">
                <li><a href="#">Overview</a></li>
                <li><a href="#">Tab 2</a></li>
                <li><a href="#">Tab 3</a></li>
                <li><a href="#">Tab 4</a></li>
            </ul>
            <section>
                <section class="clearfix">
                    <header class="grid_12 alpha omega">
                        <h2>List of Users</h2>
                    </header>
                    <div class="grid_12">
                        <div id="demo" class="clearfix"> 
                            <table class="display" id="example"> 
                                <thead> 
                                    <tr> 
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Groups</th>
                                        <th>Status</th>
                                        <th>Action</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php foreach ($users as $user):?>
                                    <tr>
                                        <td><?php echo $user->first_name;?></td>
                                        <td><?php echo $user->last_name;?></td>
                                        <td><?php echo $user->email;?></td>
                                        <td>
                                            <?php foreach ($user->groups as $group):?>
                                                <?php echo $group->name;?><br />
                                            <?php endforeach?>
                                        </td>
                                        <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
                                        <td> <a href="#">Edit</a> &bull; <a href="#">Remove</a> </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody> 
                            </table> 
                        </div>
                    </div>
                </section>
                <section class="clearfix">
                    <header class="grid_12 alpha omega">
                        <h2>Tab 2</h2>
                    </header>
                </section>
                <section class="clearfix">
                    <header class="grid_12 alpha omega">
                        <h2>Tab 3</h2>
                    </header>
                </section>
                <section class="clearfix">
                    <header class="grid_12 alpha omega">
                        <h2>Tab 4</h2>
                    </header>
                </section>
            </section>
        </section>


<!--<div class='mainInfo'>

	<h1>Users</h1>
	<p>Below is a list of the users.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
	<table cellpadding=0 cellspacing=10>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Groups</th>
			<th>Status</th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->email;?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo $group->name;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
			</tr>
		<?php endforeach;?>
	</table>
	
	<p><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a></p>
	
</div>-->
