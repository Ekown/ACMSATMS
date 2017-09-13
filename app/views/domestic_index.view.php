<?php require 'partial/head.php'; ?>

<main>
   <div class="section">
    <center>
	 	<div class="row">
	 		<div class="col l4 push-l4 s12 m8 push-m2">
	             <div class="card blue-grey darken-1">
	               	<div class="card-content white-text">
	                  <p><center><h5>Production Report</h5></center></p>
	                </div>
	             </div>
	        </div>
	    </div>
    </center>
   <form action="/domestic-in-charge/prodreport/result" method="POST">
      <!-- Sort By Dropdown -->
      <div class="container">
      <div class="row">
           <div class="input-field col l4 push-l4 s12">
             Sort By
             <select class="browser-default" name="acm_sort_by" id="sort" onchange="changeDropdown()">
              <option value="none">-----</option>
               <option value="acm_by_year">Year</option>
               <option value="acm_by_company">Company Name</option>
             </select>         
           </div>
      </div>
      <div class="row">
           <!-- Year Dropdown -->
           <div class="input-field col l4 push-l4 s12" id="by_year" hidden>
             Year
             <select class="browser-default" name="acm_sort_year" onchange="showYearTable()">
              <option value="year_none">-----</option>
               
               <?php for($i=0; $i<count($_SESSION['acm_years']); $i++) : ?>
                  <option value="<?=$_SESSION['acm_years'][$i]->curr_year;?>"> 
                    <?=$_SESSION['acm_years'][$i]->curr_year;?> 
                  </option>
               <?php endfor; ?>

             </select>         
           </div>
      </div>
      <div class="row">
           <!-- Company Dropdown -->
           <div class="input-field col l4 push-l4 s12" id="by_company" hidden>
             Company Name
             <select class="browser-default" name="acm_sort_company" onchange="showCompanyTable()">
              <option value="company_none">-----</option>
               
               <?php for($i=0; $i<count($_SESSION['acm_companies']); $i++) : ?>
                     <option value="<?=$_SESSION['acm_companies'][$i]->company_name;?>"> 
                    <?=$_SESSION['acm_companies'][$i]->company_name;?> 
                  </option>
                  <?php endfor; ?>

             </select>         
           </div>
         </div>

         <center>
         <div class="row" id="search_button" hidden>
         <button type='submit' name='btn_search' 
          class='btn btn-lg waves-effect waves-light light-green'>Search</button>
        </div>
        </center>
      </form>
      </div>
    <div class="section">
   
  <?php if($_SESSION['prodreport'] != null) : ?>

   <!-- ____________________Year Table_________________________ -->

   <div id="year_results" hidden>
      <div class="row">
        <center>
        <b>Year: </b><?=$_SESSION['acm_sort_year'];?>
        </center>
      </div>
      <hr/>
  
      <table class="striped bordered">
      <thead>
         <tr>
       <th>Client No.</th>
       <th>Company Name</th>
       <th>Date Received</th>
       <th>Package Type</th>
       <th>Invoice Value</th>
       <th>Expenses</th>
       <th>Net Profit</th>
     </tr>
     
      </thead>
    
      <tbody>
        <?php for($i=0; $i<count($_SESSION['prodreport']); $i++) : ?>
         <tr>
            <td><?=$_SESSION['prodreport'][$i]->client_no;?></td>
            <td><?=$_SESSION['prodreport'][$i]->company_name;?></td>
            <td><?=$_SESSION['prodreport'][$i]->date_received;?></td>
            <td><?=$_SESSION['prodreport'][$i]->package_types;?></td>
            <td><?=$_SESSION['prodreport'][$i]->invoice_val;?></td>
            <td><?=$_SESSION['prodreport'][$i]->expenses;?></td>
            <td><?=$_SESSION['prodreport'][$i]->net_profit;?></td>
         </tr>
        <?php endfor; ?>
      </tbody>
    
      </table>

      <div class="wrap">
        <a class="button green lighten-1" target="_blank" href="/domestic-in-charge/print/prodreport"><b>Print</b></a>
      </div>
     </div>

      <!-- ____________________Company Table_________________________ -->

     <div id="company_results" hidden> 
      <div class="row">
        <center>
        <b>Company Name:</b> <?=$_SESSION['prodreport'][0]->company_name;?>
        </center>
      </div>
      <hr/>
  
      <table class="striped bordered">
      <thead>
         <tr>
       <th>Client No.</th>
          <th>Date Received</th>
          <th>Package Type</th>
          <th>Invoice Value</th>
          <th>Expenses</th>
          <th>Net Profit</th>
       </tr>
       
      </thead>
     
      <tbody>
        <?php for($i=0; $i<count($_SESSION['prodreport']); $i++) : ?>
         <tr>
            <td><?=$_SESSION['prodreport'][$i]->client_no;?></td>
            <td><?=$_SESSION['prodreport'][$i]->date_received;?></td>
            <td><?=$_SESSION['prodreport'][$i]->package_types;?></td>
            <td><?=$_SESSION['prodreport'][$i]->invoice_val;?></td>
            <td><?=$_SESSION['prodreport'][$i]->expenses;?></td>
            <td><?=$_SESSION['prodreport'][$i]->net_profit;?></td>
         </tr>
        <?php endfor; ?>
      </tbody>
     
      </table>

      <div class="wrap">
        <a class="button green lighten-1" target="_blank" href="/domestic-in-charge/print/prodreport"><b>Print</b></a>
      </div>
     </div>

   <?php else : ?>

      <div class="row" id="no_results">
        <div class="col l4 push-l4 s12 m8 push-m2">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
               <h5>No results found</h5>
            </div>
          </div>
        </div>
      </div>

   <?php endif; ?>

  </main>

  <script>

  <?php if(isset($_POST['btn_search'])) :?>

    <?php if($_POST['acm_sort_by'] == 'acm_by_year') : ?>
      document.getElementById('year_results').removeAttribute("hidden");
    <?php else : ?>
      document.getElementById('company_results').removeAttribute("hidden");
    <?php endif; ?>
  <?php else : ?>
      document.getElementById('year_results').setAttribute("hidden","hidden");
      document.getElementById('company_results').setAttribute("hidden","hidden");

      document.getElementById('no_results').setAttribute("hidden","hidden");
  <?php endif; ?>

  <?php if($_SESSION['prodreport'] == null) : ?>
          document.getElementById('no_results').removeAttribute("hidden");
  <?php endif; ?>

  //changes the dropdown based on the sort_by dropdown
   function changeDropdown()
   {
      var sort_value = document.getElementById('sort').value;

      switch(sort_value)
      {
         case 'acm_by_year':
          document.getElementById('by_year').removeAttribute("hidden");
            document.getElementById('by_company').setAttribute("hidden","hidden");
            break;

         case 'acm_by_company':
            document.getElementById('by_company').removeAttribute("hidden");
            document.getElementById('by_year').setAttribute("hidden","hidden");
            break;

      default:
         document.getElementById('by_year').setAttribute("hidden","hidden");
         document.getElementById('by_company').setAttribute("hidden","hidden");
         document.getElementById('search_button').setAttribute("hidden","hidden");

         break;
      }
   }

   function showYearTable()
   {
      var year_value = document.getElementById('by_year').value;

      switch(year_value)
      {
        case 'year_none':
          document.getElementById('search_button').setAttribute("hidden","hidden");
          break;

        default:
          document.getElementById('search_button').removeAttribute("hidden");
          break;
      }

   }

    function showCompanyTable()
    {
      var company_value = document.getElementById('by_company').value;

      switch(company_value)
      {
        case 'company_none':
          document.getElementById('search_button').setAttribute("hidden","hidden");
          break;

        default:
          document.getElementById('search_button').removeAttribute("hidden");
          break;
      }

    }

  </script>

<?php require 'partial/footer.php'; ?>