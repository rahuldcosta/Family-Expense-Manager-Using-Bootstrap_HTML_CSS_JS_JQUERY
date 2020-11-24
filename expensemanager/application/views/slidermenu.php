<div id="MenuContainer" >   
  <ul class="list-group" id="list" style="background:yellow">
      <li class="list-group-item" style="border-bottom:3px solid black" ><span style="cursor:pointer;" class="fa fa-chevron-circle-left" onclick="SlideMyMenu(2,event)"></span><span style="cursor:pointer;margin-left:3.5em;font-size:0.7em;margin-left:3em;margin-right:3em;text-overflow: ellipsis; white-space: nowrap;overflow: hidden;display:block;margin-top:-1.6em;text-align: center" onclick="location.href='<?php echo site_url('customerprofilecontroller'); ?>'" onMouseOver="this.style.color='blue',this.style.textDecoration='underline'" onMouseOut="this.style.color='black',this.style.textDecoration='none'">
            
            <?php foreach($mega as $row) {
                
                echo $row['firstname'];
            } ?>
            
            
        </span><span class="fa fa-user" style="float:right;font-size:1em;margin-top:-1.2em" ></span></li>
       <li class="list-group-item"><i class="glyphicon glyphicon-home sidemenuops1"></i><a href='<?php echo site_url('customerhomecontroller'); ?>' class="projectfont sidemenuops">Home</a></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-piggy-bank sidemenuops1"></span><a href='<?php echo site_url('managebudgetcontroller'); ?>' class="projectfont sidemenuops">Manage Budget</a></li>
        <li class="list-group-item"><span class="glyphicon glyphicon-shopping-cart sidemenuops1"></span><a href='<?php echo site_url('checkoffercontroller'); ?>' class="projectfont sidemenuops">Check Offers</a></li>
           <li class="list-group-item"><i class="fa fa-info-circle sidemenuops1"></i><a href='<?php echo site_url('helpcontroller/customer'); ?>' class="projectfont sidemenuops">Help</a></li>
       <li class="list-group-item"><span class="glyphicon glyphicon-off sidemenuops1"></span><a class="projectfont sidemenuops" href="<?php echo site_url('customerhomecontroller/logmeout'); ?>">Log Out</a></li>
  </ul>
   
    </div>