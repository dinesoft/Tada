<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Taches</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <link rel="stylesheet" href="styles/taches.css">
  </head>
  <body>
    <section id="layout" class="pure-g">
      <aside class="sidebar pure-u-1 pure-u-md-1-5">
          <header class="header">
              <h1 class="brand-title">TADA</h1>
              <h2 class="brand-tagline">ToDo Sans Bavure</h2>
          </header>
      </aside>
      <section class="content pure-u-1 pure-u-md-4-5">
        <head>
          <h1>Tâches</h1>
          <h2>… ajouter / modifier / supprimer …</h2>
        </head>
        <table class="pure-table">
          <thead>
            <tr>
              <td colspan="4">
                <form action="?controleur=taches&action=ajouter" class="pure-form"  method="post">
                  <label>Nouvelle :</label>
                  <input type="text" size="40" name="texte" id="tache-texte">
                  <input type="submit" value="Ajouter" class="pure-button pure-button-primary">
                </form>
                
                <form action="?controleur=taches&action=effacer_termine" class="pure-form"  method="post">
                  <input type="submit" value="Supprimer les tâches terminées" style="background: rgb(202, 60, 60);" class="button-error pure-button">
                </form>
              </td>
            </tr>
            <th>Fait</th>
            <th>Opération</th>
            <th>Date</th>
            <td></td>
          </thead>
          <tbody>
            <?php foreach($taches as $t) { ?><tr>
              <td>
                <form action="?controleur=taches&action=modifier" class="pure-form"  method="post">
                  <input type="hidden" value="<?= $t->id ?>" name="id" />
                  <input type="hidden" value="0" name="termine" />
                  <input type="checkbox" value="1" <?php if ($t->termine) { echo "checked"; } ?>  name="termine" onchange="javascript:this.form.submit();"/>
                </form>
              </td>
              <td>
                <form action="?controleur=taches&action=modifier" class="pure-form"  method="post">
                  <input type="hidden" value="<?= $t->id ?>" name="id" />
                  <input type="text" value="<?= $t->texte ?>" size="40" name="texte" <?php if ($t->termine) { echo "disabled"; } ?>/>
                </form>
                <!-- <input type="submit" value="Modifier" /> -->
              </td>
              <td>
                <form action="" class="pure-form"  method="post">
                  <input type="hidden" value="<?= $t->id ?>" name="id" />
                  <input type="text" value="<?= $t->dateDebut ?>" size="15" name="texte" <?php if ($t->termine) { echo "disabled"; } ?>/>
                </form>
              </td>
              <td>
                <form action="?controleur=taches&action=effacer" class="pure-form"  method="post">
                  <input type="hidden" value="<?= $t->id ?>" name="id" />
                  <input type="submit" value="✗" class="pure-button" />
                </form>
              </td>
            </tr><?php } ?>
          </tbody>
        </table>
      </section>
    </section>
  </body>
</html>
