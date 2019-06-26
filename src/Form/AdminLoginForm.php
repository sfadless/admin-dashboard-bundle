<?php

declare(strict_types=1);

namespace SfadlessCMF\AdminDashboardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * AdminLoginForm
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class AdminLoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
        ;
    }
}