<?php
/* Smarty version 4.5.1, created on 2024-04-04 21:03:32
  from 'C:\www\Site Web\Accueil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_660ef9847663a9_47365790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04b7eb7da979237548b3cd473845f52e9e01331b' => 
    array (
      0 => 'C:\\www\\Site Web\\Accueil.tpl',
      1 => 1712257041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660ef9847663a9_47365790 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
">
    <link href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <section>
        <div class="text">
            <p>StagExplorer est un site de recherche de stage qui vous permet de trouver le stage qui vous correspond.</p><br>
            <p>Vous pouvez consulter les offres de stage, les entreprises qui les proposent et postuler directement en ligne.</p>
        </div>
    </section>
    

    <div class="stage">
        <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value;?>
">Consulter les offres de stages</a>
    </div>

    <footer>
        <div class="footer">
            <a href="#">Confidentialité</a>
            <a href="#">À propos</a>
            <a href="#">F.A.Q</a>
        </div>
    </footer>

</body>

</html>
<?php }
}
