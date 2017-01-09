<?php
	
	namespace sil21\VitrineBundle\Repository;
	
	use Doctrine\ORM\Query;
	
	/**
	 * ProductRepository
	 *
	 * This class was generated by the Doctrine ORM. Add your own custom
	 * repository methods below.
	 */
	class ProductRepository extends \Doctrine\ORM\EntityRepository {
		/**
		 * @return array
		 */
		public function findAllOrderedByName() {
			return $this->getEntityManager()
				->createQuery( 'SELECT p FROM sil21VitrineBundle:Product p ORDER BY p.name ASC' )
				->getResult();
		}
		
		public function findAllBetterSales() {
			$stmt = $this->getEntityManager()->getConnection()->prepare(
				'SELECT p.id
				FROM (
					SELECT l.product_id AS id, SUM(l.qte) AS cnt
					FROM sil21_order_line l
					GROUP BY l.product_id
					ORDER BY cnt DESC ) popu
				NATURAL JOIN sil21_product p
				LIMIT 5'
			);
			$stmt->execute();
			$productIDs = $stmt->fetchAll();
			$products = [];
			foreach ( $productIDs as $id ) {
				$products[] = $this->getEntityManager()
					->getRepository( 'sil21VitrineBundle:Product' )
					->find( $id );
			}
			
			return $products;
		}
	}
