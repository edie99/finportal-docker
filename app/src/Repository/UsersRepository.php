<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Users $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Users $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Users[] Returns an array of all Users
    //  */

    public function getAll():array{

      $conn = $this->getEntityManager()->getConnection();

      $sql = "SELECT * FROM users u ORDER BY u.id ASC";
      $stmt = $conn->prepare($sql);
      $resultSet = $stmt->executeQuery();
       // returns an array of arrays (i.e. a raw data set)
       return $resultSet->fetchAllAssociative();
    }

    // /**
    //  * @return Users[] Returns an array of Users with sunrame matching $search
    //  */
    public function searchBySurname(string $search):array{

      $conn = $this->getEntityManager()->getConnection();

      $sql = "
              SELECT * FROM users u
              WHERE LOWER(u.priezvisko) ~ ('^.*".$search.".*$')
              ORDER BY u.id ASC
              ";

       $stmt = $conn->prepare($sql);
       $resultSet = $stmt->executeQuery();
       // returns an array of arrays (i.e. a raw data set)
       return $resultSet->fetchAllAssociative();

    }

    /*
    public function findOneBySomeField($value): ?Users
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
