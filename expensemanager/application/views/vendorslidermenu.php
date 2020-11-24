<div id="MenuContainer" >   
  <ul class="list-group" id="list" style="background:yellow">
      <li class="list-group-item" style="border-bottom:3px solid black" ><span style="cursor:pointer;" class="fa fa-chevron-circle-left" onclick="SlideMyMenu(2,event)"></span><span style="cursor:pointer;margin-left:3.5em;font-size:0.7em;margin-left:3em;margin-right:3em;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;display:block;margin-top:-1.6em;text-align: center" onclick="location.href='<?php echo site_url('vendorprofilecontroller'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">
            
            <?php foreach($mega as $row) {
                
                echo $row['vendorname'];
            } ?>
            
            
        </span><span class="fa fa-user" style="float:right;font-size:1em;margin-top:-1.2em" ></span></li>
    <li class="list-group-item"><i class="fa fa-truck"></i><a href='<?php echo site_url('managebranchcontroller'); ?>' class="projectfont sidemenuops">Manage Branch</a></li>
        <li class="list-group-item"><i class="fa fa-history"></i><a href='<?php echo site_url('vendorhomecontroller'); ?>' class="projectfont sidemenuops">Offer History</a></li>
           <li class="list-group-item"><i class="fa fa-info-circle sidemenuops1"></i><a href='<?php echo site_url('helpcontroller/vendor'); ?>' class="projectfont sidemenuops">Help</a></li>
       <li class="list-group-item"><span class="glyphicon glyphicon-off sidemenuops1"></span><a class="projectfont sidemenuops" href="<?php echo site_url('vendorhomecontroller/logmeout'); ?>">Log Out</a></li>
  </ul>
   
    </div>