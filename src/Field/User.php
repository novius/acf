<?php

namespace Corcel\Acf\Field;

use Corcel\Acf\FieldInterface;
use Corcel\Model\Post;

/**
 * Class User.
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */
class User extends BasicField implements FieldInterface
{
    /**
     * @var \Corcel\User
     */
    protected $user;

    /**
     * @var \Corcel\User
     */
    protected $value;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->user = new \Corcel\User();
        $this->user->setConnection($post->getConnectionName());
    }

    /**
     * @param string $fieldName
     */
    public function process($fieldName)
    {
        $userId = $this->fetchValue($fieldName);
        $this->value = $this->user->find($userId);
    }

    /**
     * @return \Corcel\User
     */
    public function get()
    {
        return $this->value;
    }
}
