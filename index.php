<?php include "header.php";

?>

    <form class="row g-3 needs-validation" novalidate method="POST" action="recherche.php">


        <div class="col-md-4">
            <select name="aller" class="form-select" aria-label="Default select example">
                <option value="1">Aller retour</option>
                <option value="2">Aller simple</option> 
            </select>
        </div>
        
        
            <div class="col-md-4">
            <input type="text" name="depart" class="form-control" id="validationCustom01" placeholder="Départ de " value="" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="arrive" class="form-control" id="validationCustom02" placeholder="Arrivée à" value="" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
 
        
        <div class="col-md-4"> 
        <input type="text" class="form-select" id="from" name="from" placeholder="date de départ">
        </div>
        <div class="col-md-4"> 
        <input type="text" class="form-select" id="to" name="to"  placeholder="date d'arrivée"> 
        </div>

        <div class="col-12">
        <button class="btn btn-primary"  type="submit">Rechercher les vols</button>
        </div>
            
        
        </form>
    </div>

</body>
</html>
 