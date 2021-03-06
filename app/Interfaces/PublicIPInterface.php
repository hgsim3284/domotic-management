<?php
/**
 * Created by PhpStorm.
 * User: sineverba
 * Date: 25/03/2019
 * Time: 08:13
 */

namespace App\Interfaces;

interface PublicIPInterface extends BaseInterface
{

    /**
     * @return mixed
     */
    public function getLastRecord();

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data);
}
