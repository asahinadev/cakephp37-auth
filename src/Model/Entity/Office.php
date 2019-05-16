<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Office Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $email
 * @property bool $deleted
 * @property int $rank
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $updated
 *
 * @property \App\Model\Entity\User[] $users
 */
class Office extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'code' => true,
        'email' => true,
        'deleted' => true,
        'rank' => true,
        'created' => true,
        'updated' => true,
        'users' => true
    ];


    function __toString() {
        return $this->name;
    }
}
