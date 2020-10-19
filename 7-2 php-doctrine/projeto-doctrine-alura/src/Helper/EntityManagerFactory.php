<?php

namespace Muriloloffi\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

//O doctrine funciona mapeando os objetos para o banco de dados
//Criando um gerenciador de entidades que vai mapear nossas entidades
//- como o doctrine chama os objetos -, para isso o doctrine precisa
//de um gerenciador de entidade, criado abaixo;

class EntityManagerFactory
{

    //Sabemos que uma factory de entity manager retornará
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];
        return EntityManager::create($connection, $config);
    }
}