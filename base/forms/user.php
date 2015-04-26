<?php
/**
 * Description of user
 *
 * @author Rohmad
 */
$id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
$user = new User();
$user->construct();
$user->findById($id);

$data = array();
if (count($user->getResultArray()) > 0)
{
    $data = $user->getRowAray();
}
else
{
    $data = array
        (
        $user->ID       => 'NULL',
        $user->USERNAME => 'username',
        $user->PASSWORD => 'password',
        $user->NAME     => '',
        $user->ADDRESS  => '',
        $user->PHONE    => '',
        $user->EMAIL    => '',
        $user->WEBSITE  => ''
    );
}
?>
<h2 class="head-style">Tambah/Edit User</h2>
<div class="form-container">
    <form action="?module=execute&id=<?= $id ?>" method="post">
        <table>
            <tr>
                <td width="100" class="label" align="left">Username</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->USERNAME, '25', $data[$user->USERNAME]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Password</td>
                <td align="left"><?= TextField::generateDefaultPasswordField($user->PASSWORD, '25', $data[$user->PASSWORD]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Nama</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->NAME, '25', $data[$user->NAME]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Alamat</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->ADDRESS, '25', $data[$user->ADDRESS]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Telepon</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->PHONE, '25', $data[$user->PHONE]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Email</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->EMAIL, '25', $data[$user->EMAIL]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Website</td>
                <td align="left"><?= TextField::generateDefaultTextField($user->WEBSITE, '25', $data[$user->WEBSITE]) ?></td>
            </tr>
            <tr>
                <td width="100" class="label" align="left">Gambar Profil</td>
                <td align="left"><?= TextField::generateFileField($user->PROFILE_PICTURE) ?></td>
            </tr>
            <tr>
                <td colspan="2" align="left"><?= TextField::generateSubmitField('Simpan', 'button') ?></td>
            </tr>
        </table>
    </form>
</div>
