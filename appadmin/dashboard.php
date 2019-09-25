<?php
    include "includes/admin_header.php";
?>


    <!--    CONTACTS AREA-->

    <?php    
    //Querying the database for contacts information
    $category = null;
    if(isset($_POST['submit'])){
        $category = $_POST['category'];
        if($_REQUEST['category'] and $category !== 'all') {
            $contacts_detail_sql = "SELECT * FROM contacts WHERE category = '$category' ORDER BY id DESC";
        } else if($category == 'all') {
            $contacts_detail_sql = "SELECT * FROM contacts WHERE message != ' ' ORDER BY id DESC";
        } 
    }    else{
        $contacts_detail_sql = "SELECT * FROM contacts WHERE message != ' ' ORDER BY id DESC";
    }
//    running the query
    $contacts_detail_query = mysqli_query($connection, $contacts_detail_sql);

?>

    <main>

    <div id="dashboard-wrapper" class="">
        <div id="dashboard-navigation">
            <div id="filter">
                <form method="post" class="form">
                    <label for="filter-option">Filter by: </label>
                    <select name="category" id="filter-option" class="form-control">
                        <option class="bg-secondary" style="font-weight: 600;" value="<?php echo $category ?>"><?php echo ucfirst($category) ?></option>
                        <option value='product enquiry'>Product Enquiry</option>
                        <option value='customer enquiry'>Customer Enquiry</option>
                        <option value='all'>Show All</option>
                    </select>
                    <input type="submit" name="submit" value="Go" class="btn btn-sm btn-success float-right my-2">
                </form>
            </div>
        </div>

        <div id="dashboard-table">
            <table class="table table-fluid table-responsive">
                <thead>
                    <center>
                        <h3>CONTACTS</h3>
                    </center>
                </thead>

                <tbody>
                    <p class="total-count">
                        Showing
                        <?php $total_count = 
                            mysqli_num_rows($contacts_detail_query);
                            echo $total_count;
                        ?> contact(s).
                    </p>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Category</th>
                        <th>Message</th>
                    </tr>

                    <?php   $counter = 1; ?>
                    <?php foreach($contacts_detail_query as $contacts) : ?>
                    <tr>

                        <td>
                            <?php echo $counter ?>
                        </td>
                        <td>
                            <?php echo ucfirst($contacts['fullname']); ?>
                        </td>
                        <td>
                            <?php echo ucfirst($contacts['email']); ?>
                        </td>
                        <td>
                            <?php echo ucfirst($contacts['category']); ?>
                        </td>
                        <td>
                            <?php echo ucfirst($contacts['message']); ?>
                        </td>

                    </tr>

                    <?php   $counter++; ?>
                    <?php endforeach ?>



                </tbody>
            </table>
        </div>
    </div>

    </main>


    <!--    footer section-->
    <?php include "includes/footer.php"; ?>
