<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<table id="myTable" class="display" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Numer Faktury</th>
        <th>Numer Kontrahenta</th>
        <th>VAT id</th>
        <th>Kwota netto</th>
        <th>Kwota podatku VAT</th>
        <th>Kwota brutto</th>
        <th>odnosniki</th>
        <th>Data utworzenia</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value)
    {
        echo "<tr>";
        echo "<td>".$value["id"]."</td>";
        echo "<td>".$value["nrfaktury"]."</td>";
        echo "<td>".$value["nrkontrahenta"]."</td>";
        echo "<td>".$value["vatid"]."</td>";
        echo "<td>".$value["kwotanetto"]."</td>";
        echo "<td>".$value["kwotapodatkuvat"]."</td>";
        echo "<td>".$value["kwotabrutto"]."</td>";

        echo "<td><button id=\"myBtn\" onclick='openModal(\"".$value['odnosnik']."\")'>Otwórz</button></td>";
        echo "<td>".$value["created_at"]."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>ID</th>
        <th>Numer Faktury</th>
        <th>Numer Kontrahenta</th>
        <th>VAT id</th>
        <th>Kwota netto</th>
        <th>Kwota podatku VAT</th>
        <th>Kwota brutto</th>
        <th>odnosniki</th>
        <th>Data utworzenia</th>
    </tr>
    </tfoot>
</table><script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" id="modal">
        <span class="close">&times;</span>

    </div>

</div>
<script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    function openModal(x){
        $("#modal").empty();
        x=x.split(',');
        console.log(x);
        $.each(x, function(i,el){$("#modal").append("<a href=./files/"+el+">"+el+"</a><br>");})

        modal.style.display = "block";

    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<?php
