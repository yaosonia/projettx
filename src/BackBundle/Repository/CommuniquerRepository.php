<?php

namespace BackBundle\Repository;

/**
 * CommuniquerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommuniquerRepository extends \Doctrine\ORM\EntityRepository
{

    ################################## GESTION DES PROFESSEURS ######################################################
   


    public function nbremessagerecuprofesseur($email, $isparentsend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        count(c.id)
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                        UserBundle:Professeur pr
                   WITH
                        c.professeur = pr.id
                    WHERE
                        pr.email =:email
                    AND
                        c.isparentsend =:isparentsend
                ')
                ->setParameter('email',$email)
                ->setParameter('isparentsend',$isparentsend);
            
                $result = $query->getSingleScalarResult();
                return $result;
}

public function professeurmessageenvoyer($email, $isprofesseursend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        c.id,
                        p.email AS email,
                        c.objet,
                        c.contenumessage,
                        c.datemessage,
                        CONCAT(p.prenom, \' \' ,p.nom) AS nom_prenom
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                        UserBundle:Professeur pr
                   WITH
                        c.professeur = pr.id
                    WHERE
                        pr.email =:email
                    AND
                        c.isprofesseursend =:isprofesseursend
                    ORDER BY c.datemessage DESC
                ')
                ->setParameter('email',$email)
                ->setParameter('isprofesseursend',$isprofesseursend);
            
                $result = $query->getResult();
                return $result;

}
    public function professeurmessagerecu($email, $isparentsend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        c.id,
                        c.objet,
                        c.contenumessage,
                        c.datemessage,
                        CONCAT(p.prenom, \' \' ,p.nom) AS nom_prenom,
                        p.email AS parent_email
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                         UserBundle:Professeur pr
                    WITH
                         c.professeur = pr.id
                    WHERE
                        pr.email =:email
                    AND
                        c.isparentsend =:isparentsend
                    ORDER BY c.datemessage DESC
                ')
                ->setParameter('email',$email)
                ->setParameter('isparentsend',$isparentsend);
            
                $result = $query->getResult();
                return $result;

}

#################################### GESTION DES PARENTS #########################################################################


public function nbremessagerecuparent($email, $isprofesseursend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        count(c.id)
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                        UserBundle:Professeur pr
                   WITH
                        c.professeur = pr.id
                    WHERE
                        p.email =:email
                    AND
                        c.isprofesseursend =:isprofesseursend
                ')
                ->setParameter('email',$email)
                ->setParameter('isprofesseursend',$isprofesseursend);
            
                $result = $query->getSingleScalarResult();
                return $result;
  
}


public function parentmessageenvoyer($email, $isparentsend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        c.id,
                        c.objet,
                        c.contenumessage,
                        c.datemessage,
                        CONCAT(pr.prenom, \' \' ,pr.nom) AS nom_prenom
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                        UserBundle:Professeur pr
                   WITH
                        c.professeur = pr.id
                    WHERE
                        p.email =:email
                    AND
                        c.isparentsend =:isparentsend
                    ORDER BY c.datemessage DESC
                ')
                ->setParameter('email',$email)
                ->setParameter('isparentsend',$isparentsend);
            
                $result = $query->getResult();
                return $result;

}


public function parentmessagerecu($email, $isprofesseursend)
    {
        $sn = $this->getEntityManager();
        $query = $sn->createQuery('
                    SELECT
                        c.id,
                        c.objet,
                        c.contenumessage,
                        c.datemessage,
                        CONCAT(pr.prenom, \' \' ,pr.nom) AS nom_prenom
                    FROM
                        BackBundle:Communiquer c
                    INNER JOIN
                        UserBundle:Parents p
                    WITH
                        c.parents = p.id
                    INNER JOIN
                        UserBundle:Professeur pr
                   WITH
                        c.professeur = pr.id
                    WHERE
                        p.email =:email
                    AND
                        c.isprofesseursend =:isprofesseursend
                    ORDER BY c.datemessage DESC
                ')
                ->setParameter('email',$email)
                ->setParameter('isprofesseursend',$isprofesseursend);
            
                $result = $query->getResult();
                return $result;

}

}
