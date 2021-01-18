<link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<link rel="stylesheet" href="./mystyle.css">
<table id="myTable" class="display" style="width:100%">

    <thead>
    <tr>
        <th>ID</th>
        <?php
        $role=\app\Core\Application::getRole();
        if($role==1||$role==0)
            echo "<th>Options</th>";
        if($role==1 || $role==2)
            echo "<th>email</th>";
        ?>
        <th>Numer inwentarzowy</th>
        <th>Nazwa sprzętu</th>
        <th>Numer seryjny</th>
        <th>Data zakupu</th>
        <th>ID faktury</th>
        <th>Gwarancja do</th>
        <th>Wartość netto</th>
        <th>Na czyim stanie jest sprzęt</th>
        <th>Notatki</th>
        <th>Data utworzenia</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value)
    {
        echo "<tr id=".$value['id'].">";
        echo "<td>".$value["id"]."</td>";
        if($role==0||$role==1) {
            echo "<td> <button class=\"dbtn\" onclick='deleteRecord(\"" . $value['id'] . "\")'> <i class=\"fas fa-minus-circle\"></i></button>";
            echo "<button class=\"ebtn\" onclick='editRecord(\"" . $value['id'] . "\")'><i class=\"fas fa-edit\"></i></button>";
            echo "</td>";
        }
        if($role == 1 || $role==2)
            echo "<td>".$value["email"]."</td>";
        echo "<td>".$value["nrinwentarz"]."</td>";
        echo "<td>".$value["nazwasprzetu"]."</td>";
        echo "<td>".$value["numerseryjny"]."</td>";
        echo "<td>".$value["datazakupu"]."</td>";
        echo "<td><button id=\"myBtn\" onclick='openModal(\"".$value['idfaktury']."\")'>Otwórz</button></td>";
        echo "<td>".$value["gwarancja"]."</td>";
        echo "<td>".$value["wartoscnetto"]."</td>";
        echo "<td>".$value["posiadaczsprzetu"]."</td>";
        echo "<td>".$value["notatki"]."</td>";
        echo "<td>".$value["created_at"]."</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>ID</th>
        <?php
        $role=\app\Core\Application::getRole();
        if($role==1||$role==0)
            echo "<th>Options</th>";
        if($role==1 || $role==2)
            echo "<th>email</th>";
        ?>
        <th>Numer inwentarzowy</th>
        <th>Nazwa sprzętu</th>
        <th>Numer seryjny</th>
        <th>Data zakupu</th>
        <th>ID faktury</th>
        <th>Gwarancja do</th>
        <th>Wartość netto</th>
        <th>Na czyim stanie jest sprzęt</th>
        <th>Notatki</th>
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
<div id="myEditModal" class="modal">
    <div class="modal-content" id="modal">
        <span class="close2">x</span>
        <h1>Edytuj Licencje</h1>
        <div class="fakturas">
            <?php $form = \app\Core\form\Form::begin('/edit', "POST","multipart/form-data") ?>
            <div class="row">
                <div class="col">
                    <input type="hidden" name="id">
                    <input type="hidden" name="action" value="devices">
                    <?php echo $form->field($model,"nrinwentarz" ); ?>
                </div>
                <div class="col">
                    <?php echo $form->field($model, 'nazwasprzetu'); ?>
                </div>
            </div>
            <?php echo $form->field($model, 'numerseryjny'); ?>
            <?php echo $form->date_field($model, 'datazakupu'); ?>
            <?php echo $form->date_field($model, 'gwarancja'); ?>
            <?php echo $form->field($model, 'wartoscnetto'); ?>
            <?php echo $form->field($model, 'posiadaczsprzetu'); ?>
            <?php echo $form->field($model, 'notatki'); ?>
            <button type="submit">Edytuj</button>
        </div>
        <?php \app\Core\form\Form::end() ?>
    </div>
</div>
<script>
    var modal = document.getElementById("myModal");
    var editmodal = document.getElementById("myEditModal");
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close2")[0];

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
    span2.onclick =function()
    {
        editmodal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == editmodal)
        {
            editmodal.style.display = "none";
        }
    }
    function deleteRecord(x) {
        document.location = '/delete?id='+x+'&table=devices'
    }
    function editRecord(x)
    {
        x=x.split(',');
        editmodal.style.display = "block";
        let row = document.getElementById(x);
        document.getElementsByName("nrinwentarz")[0].value=row.getElementsByTagName("td")[3].innerText;
        document.getElementsByName("nazwasprzetu")[0].value=row.getElementsByTagName("td")[4].innerText;
        document.getElementsByName("numerseryjny")[0].value=row.getElementsByTagName("td")[5].innerText;
        document.getElementsByName("datazakupu")[0].value=row.getElementsByTagName("td")[6].innerText;
        document.getElementsByName("gwarancja")[0].value=row.getElementsByTagName("td")[8].innerText;
        document.getElementsByName("wartoscnetto")[0].value=row.getElementsByTagName("td")[9].innerText;
        document.getElementsByName("posiadaczsprzetu")[0].value=row.getElementsByTagName("td")[10].innerText;
        document.getElementsByName("notatki")[0].value=row.getElementsByTagName("td")[11].innerText;
        document.getElementsByName("id")[0].value=x;

    }
</script>
<?php