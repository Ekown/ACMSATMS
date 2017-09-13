<nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" class="brand-logo"><img class="responsive-img" src="/public/img/acmnew.png"></a>

    <ul class="right hide-on-med-and-down">
        <ul class="right hide-on-med-and-down">

            <?php 
                switch ($_SESSION['acm_userlevel']) 
                {
                case 'Admin':
                        require('admin_nav.php');
                        break;
                   
                    case 'Accounting In-Charge':
                        require('accounting_nav.php');
                        break; 

                    case 'Branch Manager':
                        require('branch_nav.php');
                        break; 

                    case 'Domestic In-Charge':
                        require('domestic_nav.php');
                        break; 

                    case 'Operations Manager':
                        require('operations_nav.php');
                        break;

                    case 'Agent':
                        require('agent_nav.php');
                        break;

                    case 'Corporate':
                        require('corporate_nav.php');
                        break;

                    case 'User':
                        require('user_nav.php');
                        break;
                }
            ?>

            <li>
                <a class="dropdown-button" data-beloworigin="true" data-activates="dropdown1" href="#">Settings<i class="material-icons right">arrow_drop_down</i></a>
            </li>
    
        </ul>
    </ul>

    <ul id="nav-mobile" class="side-nav">

        <?php 
            switch ($_SESSION['acm_userlevel']) 
            {
                case 'Admin':
                    require('admin_nav.php');
                    break;
               
                case 'Accounting In-Charge':
                    require('accounting_nav.php');
                    break; 

                case 'Branch Manager':
                    require('branch_nav.php');
                    break; 

                case 'Domestic In-Charge':
                    require('domestic_nav.php');
                    break; 

                case 'Operations Manager':
                    require('operations_nav.php');
                    break;

                case 'Agent':
                    require('agent_nav.php');
                    break;

                case 'Corporate':
                    require('corporate_nav.php');
                    break;

                 case 'User':
                        require('user_nav.php');
                        break;
            }
        ?>
        <li>
            <a href="/changepass">Change Password</a>
        </li>
        
        <li>
            <a href="javascript:logout();">Log Out</a>
        </li>
    </ul>
    
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>


    </div>
  </nav>

  <ul id="dropdown1" class="dropdown-content">
    <li><a href="/changepass">Change Password</a></li>
    <li class="divider"></li>
    <li><a href="javascript:logout();">Log Out</a></li>
</ul>