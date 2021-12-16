<html>
    <head>
        <title>Travel Agency</title>
    </head>

    <body>
        <h2>Reset</h2>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>

         <form method="POST" action="project.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <hr />

        <h2>Count the Tuples in the Travel Agency DataBase</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
        <select name="tables" id="tables">
            <option value="Employee">Employee</option>
            <option value="Customer">Customer</option>
            <option value="Hotel">Hotel</option>
            <option value="Attractions">Attractions</option>
        </select>
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>

        <hr />

        <h2>Print All Tuples for Selected Entity in Travel Agency DataBase</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
        <select name="entity" id="entity">
            <!--<option value="AttractionReservation">AttractionReservation</option>-->
            <option value="Attractions">Attractions</option>
            <option value="BringsLuggage">BringsLuggage</option>
            <!--<option value="BusDriver">BusDriver</option> -->
            <option value="City">City</option>
            <option value="Customer">Customer</option>
            <option value="CustomerEmails">CustomerEmails</option>
            <!--<option value="DriverTransports">DriverTransports</option>-->
            <option value="Employee">Employee</option>
            <option value="HelpsCustomer">HelpsCustomer</option>
            <option value="Hotel">Hotel</option>
            <option value="HotelFloors">HotelFloors</option>
            <option value="HotelReservation">HotelReservation</option>
            <!--<option value="JoinTour">JoinTour</option>-->
            <!--<option value="TourGoesTo">TourGoesTo</option>-->
            <!--<option value="TourGroupGuides">TourGroupGuides</option>-->
            <!--<option value="TourGuide">TourGuide</option> -->
            <option value="TravelAgency">TravelAgency</option>
            <!--<option value="TravelAgent">TravelAgent</option>-->
            <option value="TravelCity">TravelCity</option>
        </select>
            <input type="hidden" id="allTupleRequest" name="allTupleRequest">
            <input type="submit" name="allTuples"></p>
        </form>

        <hr />

        <h2>Insert a New Customer (Insert)</h2>
        
        <form method="POST" action="project.php"> <!--refresh page when submitted-->
            <label for="id">ID:</label>
            <input type="text" id="id" name="id"><br><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br><br>    
            <input type="hidden" id="insertCustomerRequest" name="insertCustomerRequest">
            <input type="submit" name="insertSubmit"></p>
        </form>

        <h2>Update Employee Info (Update)</h2>
        
        <form method="POST" action="project.php"> <!--refresh page when submitted-->
            <label for="id">ID of Employee to update:</label>
            <input type="text" id="id" name="id"><br><br>
            What change are we making?<br><br>
            <select name="employeeAttr" id="employeeAttr">
                <option value="ID">ID</option>
                <option value="AgencyName">Agency</option>
                <option value="EmployeeName">Name</option>
            </select>
            <input type="text" id="updateValue" name="updateValue"><br><br>
            <input type="hidden" id="updateEmployeeRequest" name="updateEmployeeRequest">
            <input type="submit" name="insertSubmit"></p>
        </form>

        <h2>Delete Exisiting Customer (Delete)</h2>
        
        <form method="POST" action="project.php"> <!--refresh page when submitted-->
            <label for="id">ID:</label>
            <input type="text" id="id" name="id"><br><br>  
            <input type="hidden" id="deleteCustomerRequest" name="deleteCustomerRequest">
            <input type="submit" name="deleteSubmit"></p>
        </form>


        <h2>Select Table and Attributes (Selection)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            
        <p>Table</p>
        <select name="tablesSel" id="tablesSel">
                <option value="TravelCity">TravelCity</option>
                <option value="HotelReservation">HotelReservation</option>
                <option value="Employee">Employee</option>
                <option value="HelpsCustomer">HelpsCustomer</option>
                <option value="Customer">Customer</option>
            </select>
            
            <p> Attr1: </p>
            <select name="Attr1" id="Attr1">
                <option value="DateStart">DateStart</option>
                <option value="CheckIn">CheckIn</option>
                <option value="AgencyName">AgencyName</option>
                <option value="CustomerName">CustomerName</option>
            </select>

            <label for="Val1"> = Val1:</label>
            <input type="text" id="Val1" name="Val1"><br><br>

            <p> AND Attr2: </p>

            <select name="Attr2" id="Attr1">
                <option value="ID">ID</option>
                <option value="RoomNum">RoomNum</option>
            </select>

            <label for="Val2"> > Val2:</label>
            <input type="text" id="Val2" name="Val2"><br><br>
            
            <input type="hidden" id="selectCityRequest" name="selectCityRequest">
            <input type="submit" name="findCities"></p>

        </form>

        <h2>Find Available Hotels (Projection)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <label for="city">City:</label>
            <input type="text" id="city" name="city"><br><br>  
            <input type="hidden" id="hotelsRequest" name="hotelsRequest">
            <input type="submit" name="findHotels"></p>
        </form>

        <h2>Find Name of City with this Attraction (Join)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <label for="AttractionCoords">Attraction Coordinates:</label>
            <input type="text" id="AttractionCoords" name="AttractionCoords"><br><br>  
            <input type="hidden" id="attractionsCityRequest" name="attractionsCityRequest">
            <input type="submit" name="findAttractionCity"></p>
        </form>

        <h2>Find Number of Customers Staying at all Hotels with Reservations (Group By)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <input type="hidden" id="hotelCountRequest" name="hotelCountRequest">
            <input type="submit" name="findHotelCount"></p>
        </form>

        <h2>Find Customers with more than 1 Piece of Luggage (Having)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <input type="hidden" id="luggageRequest" name="luggageRequest">
            <input type="submit" name="findLuggage"></p>
        </form>

        <h2>Find the average Hotel Rates of locations above the overall Hotel Rate average (Nested Aggregation with Group By)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <input type="hidden" id="expensiveHotelRatesRequest" name="expensiveHotelRatesRequest">
            <input type="submit" name="findExpensiveHotelRates"></p>
        </form>

        <h2>Find Customers Who Have Trips for All Available Cities (Division)</h2>
        
        <form method="GET" action="project.php"> <!--refresh page when submitted-->
            <input type="hidden" id="allTripsRequest" name="allTripsRequest">
            <input type="submit" name="findAllTrips"></p>
        </form>

        <?php
            //this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

            function printResult($result) { //prints results from a select statement
                echo "<br>Retrieved data from table demoTable:<br>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th></tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]"
                }

                echo "</table>";
            }

            function connectToDB() {
                global $db_conn;

                // Your username is ora_(CWL_ID) and the password is a(student number). For example,
                // ora_platypus is the username and a12345678 is the password.
                $db_conn = OCILogon("ora_traab", "a73694689", "dbhost.students.cs.ubc.ca:1522/stu");

                if ($db_conn) {
                    debugAlertMessage("Database is Connected");
                    return true;
                } else {
                    debugAlertMessage("Cannot connect to Database");
                    $e = OCI_Error(); // For OCILogon errors pass no handle
                    echo htmlentities($e['message']);
                    return false;
                }
            }

            function disconnectFromDB() {
                global $db_conn;

                debugAlertMessage("Disconnect from Database");
                OCILogoff($db_conn);
            }

            function handleInsertRequest() {
                global $db_conn;

                //Getting the values from user and insert data into the table
                $tuple = array (
                    ":bind1" => $_POST['insNo'],
                    ":bind2" => $_POST['insName']
                );

                $alltuples = array (
                    $tuple
                );

                executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
                OCICommit($db_conn);
            }

            function handleAllTuplesRequest(){
                global $db_conn;

                $result = executePlainSQL(
                    "SELECT *
                    FROM " . $_GET['entity']
                    );
                    
                    echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                    
                    while($row = OCI_Fetch_Array($result, OCI_BOTH)){
                        for($i = 0; $i < count($row); $i++){
                            echo " " . $row[$i] . "    ";
                        }
                        
                        echo "<br> ";
                    }     

                OCICommit($db_conn);
            }

            /**
             * Insert a new customer with their ID, name and email
             */
            function handleInsertCustomer(){
                global $db_conn;

                executePlainSQL("INSERT INTO Customer VALUES (" . $_POST['id'] . ", '" . $_POST['name'] . "')");
                executePlainSQL("INSERT INTO CustomerEmails VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "')");

                OCICommit($db_conn);
            }

            /**
             * Delete a customer with just their ID
             * Also deletes from CustomerEmails table
             */
            function handleDeleteCustomer(){
                global $db_conn;
                
                //Get customer name for deleting customer email aswell
                $result = oci_parse($db_conn,"SELECT CustomerName FROM Customer WHERE ID=" . $_POST['id']);
                oci_execute($result);
                
                //delete customer from cutomer and email tables
                while(oci_fetch($result)){
                    executePlainSQL("DELETE FROM Customer WHERE ID=" . $_POST['id']);
                    executePlainSQL("DELETE FROM CustomerEmails WHERE CustomerName='" . oci_result($result, 'CUSTOMERNAME') . "'");
                }
                OCICommit($db_conn);
            }

            /**
             * Update any attribute of the Employee table
             */
            function handleUpdateEmployee(){
                global $db_conn;
                executePlainSQL(
                    "UPDATE Employee
                    SET " . $_POST['employeeAttr'] . " = '" . $_POST['updateValue'] . "' 
                    WHERE ID = '" . $_POST['id'] . "'"
                );
                
                OCICommit($db_conn);
            }

            /**
             * Select cities whos inputed user date lies in between the start time and end time of travelling to the city
             */
            function handleCitiesRequest(){
                global $db_conn;
                // echo "<script>console.log('Debug Objects: " . $_GET['starttime'] . "' );</script>";
                // $result = executePlainSQL(
                //     "SELECT *
                //     FROM TravelCity tc, City c
                //     WHERE tc.CityCoords = c.CityCoords AND tc.DateStart > DATE '" . $_GET["starttime"] . "'"
                // );
                
                // //Print rows of the result
                // while(oci_fetch($result)){
                //     echo "<br> " . oci_result($result, 'CITYNAME') . ", Coords: "
                //     . oci_result($result, 'CITYCOORDS') . ", Customer ID: "
                //     . oci_result($result, 'ID') . ", Leave: "
                //     . oci_result($result, 'DATESTART') . ", Arrive: "
                //     . oci_result($result, 'DATEEND') . "<br>";
                // }

                if(!strcmp($_GET['tablesSel'], 'TravelCity')){
                    $result = executePlainSQL(
                        "SELECT *
                        FROM " . $_GET['tablesSel'] . 
                        " WHERE " .  $_GET['Attr1'] . " = DATE '" . $_GET['Val1'] . "' AND " . $_GET['Attr2'] . " > " . $_GET['Val2']
                    );
                }else if(!strcmp($_GET['tablesSel'], 'HotelReservation')){
                    $result = executePlainSQL(
                        "SELECT *
                        FROM " . $_GET['tablesSel'] . 
                        " WHERE " .  $_GET['Attr1'] . " = TIMESTAMP '" . $_GET['Val1'] . "' AND " . $_GET['Attr2'] . " > " . $_GET['Val2']
                    );
                }else if(!strcmp($_GET['tablesSel'], 'Employee')){
                    $result = executePlainSQL(
                        "SELECT *
                        FROM " . $_GET['tablesSel'] . 
                        " WHERE " .  $_GET['Attr1'] . " = '" . $_GET['Val1'] . "' AND " . $_GET['Attr2'] . " > " . $_GET['Val2']
                    );
                }else if(!strcmp($_GET['tablesSel'], 'HelpsCustomer')){
                    $result = executePlainSQL(
                        "SELECT *
                        FROM " . $_GET['tablesSel'] . 
                        " WHERE " .  $_GET['Attr1'] . " = '" . $_GET['Val1'] . "' AND " . $_GET['Attr2'] . " > " . $_GET['Val2']
                    );
                }else if(!strcmp($_GET['tablesSel'], 'Customer')){
                    $result = executePlainSQL(
                        "SELECT *
                        FROM " . $_GET['tablesSel'] . 
                        " WHERE " .  $_GET['Attr1'] . " = '" . $_GET['Val1'] . "' AND " . $_GET['Attr2'] . " > " . $_GET['Val2']
                    );
                }

                while($row = OCI_Fetch_Array($result, OCI_BOTH)){
                        for($i = 0; $i < count($row); $i++){
                            echo " " . $row[$i] . "    ";
                        }
                        
                        echo "<br> ";
                    }     

                OCICommit($db_conn);
            }

            /**
             * Counts the number of tupples in the table from the selected dropdown menu
             */
            function handleCountRequest() {
                global $db_conn;
    
                $result = executePlainSQL("SELECT Count(*) FROM ". $_GET["tables"]);
    
                if (($row = oci_fetch_row($result)) != false) {
                    echo "<br> The number of tuples in " . $_GET["tables"] . ": " . $row[0] . "<br>";
                }
            }

            /**
             * Projects out hotels located in the user inputed city
             */
            function handleHotelsRequest(){
                global $db_conn;
                $result = oci_parse($db_conn,"SELECT HotelName, CityCoords, Rate FROM Hotel WHERE HotelLocation='" . $_GET['city'] . "'");
                oci_execute($result);
                
                while(oci_fetch($result)){
                    debugAlertMessage($result);
                    echo "<br> " . oci_result($result, 'HOTELNAME') . ", Located: "
                    . oci_result($result, 'CITYCOORDS') . ", With Rate: "
                    . oci_result($result, 'RATE') . "<br>";
                }
                OCICommit($db_conn);
            }

            /**
             * Find City with this attraction
             */
            function handleAttractionCityRequest(){
                global $db_conn;
                $result = executePlainSQL("SELECT CityName FROM City c, Attractions a WHERE c.CityCoords = a.CityCoords and AttractionCoordinates='" . $_GET['AttractionCoords'] . "'");
                $row = oci_fetch_row($result);
                if ($row) {
                    echo "<br>" . $row[0];
                } else {
                    echo "Attraction not found";
                }
            }

            /**
             * Find attractions which are available at the user inputed date
             */
            function handleAttractionsRequest(){
                global $db_conn;
                
                $result = oci_parse($db_conn,"
                SELECT AttractionName, StartTime, EndTime 
                FROM AttractionReservation ar, Attractions a
                WHERE ar.AttractionCoordinates = a.AttractionCoordinates
                AND ar.EndTime > TIMESTAMP '" . $_GET['date'] . " 00:00:00' 
                AND ar.StartTime < TIMESTAMP '" . $_GET['date'] . " 00:00:00'");
                oci_execute($result);
                echo "<script>console.log('Debug Objects: " . $_GET['date'] . "' );</script>";
                echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                while(oci_fetch($result)){
                    echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                    echo "<br> " . oci_result($result, 'ATTRACTIONNAME') . ", Start: "
                    . oci_result($result, 'STARTTIME') . ", End: "
                    . oci_result($result, 'ENDTIME') . "<br>";
                }
                OCICommit($db_conn);
            }

            /**
             * Returns the a list of all hotels and the number of customers staying at each
             */
            function handleHotelCountRequest(){
                global $db_conn;
                
                $result = executePlainSQL(
                "SELECT Count(ID), HotelName, HotelLocation
                FROM HotelReservation
                GROUP BY HotelName, HotelLocation"
                );
                
                echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                while($row = oci_fetch($result)){
                    echo "<br> " . oci_result($result, 'COUNT(ID)') . " Customer(s) at "
                    . oci_result($result, 'HOTELNAME') . " in "
                    . oci_result($result, 'HOTELLOCATION') . "<br>";
                }

                OCICommit($db_conn);
            }

            /**
             * Returns the customers who have more than one piece of luggage
             */
            function luggageCountRequest(){
                global $db_conn;
                
                $result = executePlainSQL(
                "SELECT Max(NUM), CustomerName
                FROM Customer c, BringsLuggage bl
                WHERE c.ID = bl.ID
                GROUP BY c.CustomerName
                HAVING Max(NUM) > 1"
                );
                
                echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                
                while($row = oci_fetch($result)){
                    echo "<br> Customer: " . oci_result($result, 'CUSTOMERNAME') . " has "
                    . oci_result($result, 'MAX(NUM)') . " Pieces of Luggage<br>";
                }

                OCICommit($db_conn);
            }

            /**
             * Returns the average number of tourists at a user entered attraction
             */
            function attractionTourRequest(){
                global $db_conn;

                // $result = executePlainSQL(
                //     "SELECT t.NumGuests, a.AttractionName, t.ID
                //     FROM TourGroupGuides t, Attractions a, TourGoesTo tt
                //     WHERE tt.ID = t.ID AND a.AttractionCoordinates = tt.Coordinates AND
                //     t.NumGuests > (
                //         SELECT AVG(t2.NumGuests)
                //         FROM TourGroupGuides t2, Attractions a2, TourGoesTo tt2
                //         WHERE tt2.ID = t2.ID AND a2.AttractionCoordinates = tt2.Coordinates
                //     )
                //     "
                // );

                $result = executePlainSQL(
                    "SELECT AVG(t.NumGuests) AS avg_guests, a.AttractionName
                    FROM TourGroupGuides t, Attractions a, TourGoesTo tt
                    WHERE tt.ID = t.ID AND a.AttractionCoordinates = tt.Coordinates AND
                    a.AttractionCoordinates IN (
                        SELECT a2.AttractionCoordinates
                        FROM Attractions a2
                        WHERE a2.AttractionName = '" . $_GET['attraction'] ."'
                    )
                    GROUP BY a.AttractionName"
                );
                
                while($row = oci_fetch($result)){
                    echo "<br>". oci_result($result, 'ATTRACTIONNAME') . " has an average of " 
                    . oci_result($result, 'AVG_GUESTS') . " Guests <br>";
                }

                OCICommit($db_conn);
            }

            function findAllTripsRequest(){
                global $db_conn;

                $result = executePlainSQL(
                    "SELECT CustomerName, ID
                    FROM Customer C
                    WHERE NOT EXISTS
                            ((SELECT CT.CityCoords
                            FROM City CT)
                            MINUS
                            (SELECT T.CityCoords
                            FROM TravelCity T
                            WHERE T.ID = C.ID))"
                );
                echo "<script>console.log('Debug Objects2: " . $result . "' );</script>";
                while($row = oci_fetch($result)){
                    echo "<br>" . oci_result($result, 'CUSTOMERNAME') . " with ID "
                    . oci_result($result, 'ID') . " has Trips for all Cities <br>";
                }

                OCICommit($db_conn);
            }



            /**
             * Find the average Hotel Rates of locations above the overall Hotel Rate average
             */
            function handleExpensiveHotelRatesRequest() {
                global $db_conn;
                $result = executePlainSQL("SELECT HotelLocation, AVG(Rate)
                                           FROM Hotel
                                           GROUP BY HotelLocation
                                           HAVING AVG(Rate) > (SELECT AVG(Rate) FROM Hotel)"
                                         );
                while (($row = oci_fetch_row($result)) != false) {
                    echo "<br> Location: " . $row[0] . "<br>Average Hotel Rate: " . $row[1] . "<br>";
                }
            }

            /**
             * Resets the table
             */
            function handleResetRequest() {
                global $db_conn;
                
                // Create new table
                echo "<br> creating new table <br>";
                $query = file_get_contents("project.sql");
                $array = explode(';',$query);
                
                foreach($array as $a){
                    
                    if(!empty($a)){
                        oci_execute(oci_parse($db_conn,$a));
                    }
                }
                
            }

            // HANDLE ALL POST ROUTES
            // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
            function handlePOSTRequest() {
                if (connectToDB()) {
                    if (array_key_exists('resetTablesRequest', $_POST)) {
                        handleResetRequest();
                    } else if (array_key_exists('updateQueryRequest', $_POST)) {
                        handleUpdateRequest();
                    } else if (array_key_exists('insertQueryRequest', $_POST)) {
                        handleInsertRequest();
                    } else if (array_key_exists('insertCustomerRequest', $_POST)){
                        handleInsertCustomer();
                    } else if (array_key_exists('deleteCustomerRequest', $_POST)){
                        handleDeleteCustomer();
                    } else if (array_key_exists('updateEmployeeRequest', $_POST)){
                        handleUpdateEmployee();
                    }

                    disconnectFromDB();
                }
            }

        // HANDLE ALL GET ROUTES
	    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                } else if (array_key_exists('allTuples', $_GET)) {
                    handleAllTuplesRequest();
                } else if (array_key_exists('findHotels', $_GET)) {
                    handleHotelsRequest();
                } else if (array_key_exists('findAttractions', $_GET)) {
                    handleAttractionsRequest();
                } else if (array_key_exists('findCities', $_GET)) {
                    handleCitiesRequest();
                } else if (array_key_exists('findHotelCount', $_GET)) {
                    handleHotelCountRequest();
                } else if (array_key_exists('findLuggage', $_GET)) {
                    luggageCountRequest();
                } else if (array_key_exists('findAttractionTour', $_GET)) {
                    attractionTourRequest();
                } else if (array_key_exists('findAttractionCity', $_GET)) {
                    handleAttractionCityRequest();
                } else if (array_key_exists('findExpensiveHotelRates', $_GET)) {
                    handleExpensiveHotelRatesRequest();
                }else if (array_key_exists('findAllTrips', $_GET)) {
                    findAllTripsRequest();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit']) || isset($_POST['updateSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest']) || isset($_GET['allTupleRequest']) || isset($_GET['attractionsRequest']) || isset($_GET['hotelsRequest']) || 
        isset($_GET['attractionsCityRequest']) || isset($_GET['selectCityRequest']) || isset($_GET['hotelCountRequest']) || isset($_GET['luggageRequest']) || 
        isset($_GET['attractionTourRequest']) || isset($_GET['expensiveHotelRatesRequest']) || isset($_GET['allTripsRequest'])) {
            handleGETRequest();
        }
        ?>
    </body>
</html>
