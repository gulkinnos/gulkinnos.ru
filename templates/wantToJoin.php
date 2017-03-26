<form name="wantJoJoin" action="?wantToJoin" method="POST" class="col-lg-3 col-md-3 col-sm-6">
    <input type="text" name="githubNickname" class="form-control" value="<?= (isset($githubNickname) && $githubNickname != '') ? $githubNickname : '' ?>" placeholder="<?= (isset($githubNickname) && $githubNickname != '') ? '' : 'введите ник' ?>"/>
    <input type="text" name="name" class="form-control <?= (isset($userName) && $userName != '') ? '' : 'notValid' ?>" value="<?= (isset($userName) && $userName != '') ? $userName : '' ?>" placeholder="<?= (isset($userName) && $userName != '') ? '' : 'введите имя' ?>"/>
    <input type="submit" value="Присоединиться" name="joinUs" />
</form>