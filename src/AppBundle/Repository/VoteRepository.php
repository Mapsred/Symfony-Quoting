<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Quote;
use Doctrine\ORM\EntityRepository;

/**
 * VoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteRepository extends EntityRepository
{
    /**
     * @param Quote $quote
     * @return int
     */
    public function countForQuote(Quote $quote)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l)')
            ->where("l.quote = :quote")
            ->setParameter("quote", $quote)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param Quote $quote
     * @param string $type
     * @return int
     */
    public function countTypeForQuote(Quote $quote, $type)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l)')
            ->where("l.quote = :quote")
            ->andWhere("l.type = :type")
            ->setParameters(["quote" => $quote, "type" => $type])
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param Quote $quote
     * @return array
     */
    public function findByQuote(Quote $quote)
    {
        return $this->findBy(['quote' => $quote]);
    }

    /**
     * @param Quote $quote
     * @param string $type
     * @return array
     */
    public function findByQuoteAndType(Quote $quote, $type = "no")
    {
        return $this->findBy(['quote' => $quote], ["type" => $type]);

    }

}
