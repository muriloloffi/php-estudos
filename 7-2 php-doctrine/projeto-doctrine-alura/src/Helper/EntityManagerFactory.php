<?php

namespace Muriloloffi\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
/*
O doctrine funciona mapeando os objetos para o banco de dados.
Cria-se um gerenciador de entidades que vai mapear nossas entidades
- como o doctrine chama os objetos;
*/
class EntityManagerFactory
{
    /*
    Estes comentários com @, como visto abaixo, são as anotações ativadas 
    por meio do código nesta classe.

    Sabemos que uma factory de entity manager retornará: (...) continua em 
    novo comentário com dois asteriscos no início.
    */

    /** 
     * @return EntityManagerInterface 
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        /*
        método que liga anotações como parâmetros de configuração do ORM;
        */ 
        $config = Setup::createAnnotationMetadataConfiguration( 
            /*
            caminho onde vai procurar as anotações no código;
            */
            [$rootDir . '/src'], 
            true
        );
        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'curso_doctrine',
            'user' => 'murilo',
            'password' => 'curso.estudo.estagio'
        ];
        return EntityManager::create($connection, $config);
    }
}