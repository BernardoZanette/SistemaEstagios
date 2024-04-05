<div id='menu'>
    <img src="images/logo.png" id="logo" alt="Logo do IFRS">
    <p>Olá, <?php echo $_SESSION['usuarios']->getNome();?>!</p>
    <button id="menu_button"><i id='icone_lista' class='fa-solid fa-bars'></i></button>
    <div id='menu_lista'>
        <ul>
            <li>
                <a href="estagios.php">Estagios</a>
            </li>
            <li>
                <a href="documentos.php">Documentos</a>
            </li>
            <li>
                <a href="cursos.php">Cursos</a>
            </li>
            <li>
                <a href="estudantes.php">Estudantes</a>
            </li>
            <li>
                <a href="areas.php">Areas</a>
            </li>
            <li>
                <a href="professores.php">Professores</a>
            </li>
            <li>
                <a href="empresas.php">Empresas</a>
            </li>
            <li>
                <a href="representantes.php">Representantes</a>
            </li>
            <li>
                <a href="supervisores.php">Supervisores</a>
            </li>
            <li>
                <a href="cidades.php">Cidades</a>
            </li>
            <li>
                <a href="usuarios.php">Usuários</a>
            </li>
            <li>
                <a href="logout.php">Sair</a>
            </li>
        </ul>
    </div>
</div>