<?php
	
	namespace sil21\AdminBundle\Controller;
	
	use sil21\VitrineBundle\Entity\Category;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	class CategoryController extends Controller {
		public function indexAction() {
			$em = $this->getDoctrine()->getManager();
			
			$categories = $em->getRepository( 'sil21VitrineBundle:Category' )->findAll();
			
			return $this->render(
				'sil21AdminBundle:Category:index.html.twig', [
					'categories' => $categories,
				]
			);
		}
		
		/**
		 * @param \sil21\VitrineBundle\Entity\Category $category
		 *
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function articlesByCategoryAction( Category $category ) {
			return $this->render(
				'sil21AdminBundle:Catalogue:listProducts.html.twig',
				[
					'name'     => $category->getName(),
					'products' => $category->getProducts()
				]
			);
		}
		
		public function listAction() {
			$categories = $this->getDoctrine()->getRepository( 'sil21VitrineBundle:Category' )->findAll();
			
			return $this->render(
				'sil21AdminBundle:Category:listCategories.html.twig', [ 'categories' => $categories ]
			);
		}
		
		/**
		 * Creates a new category entity.
		 *
		 */
		public function newAction( Request $request ) {
			$category = new Category();
			$form = $this->createForm( 'sil21\VitrineBundle\Form\CategoryType', $category );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->persist( $category );
				$em->flush( $category );
				
				return $this->redirectToRoute( 'category_show', [ 'id' => $category->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Category:new.html.twig', [
					'category' => $category,
					'form'     => $form->createView(),
				]
			);
		}
		
		/**
		 * Finds and displays a category entity.
		 *
		 */
		public function showAction( Category $category ) {
			$deleteForm = $this->createDeleteForm( $category );
			
			return $this->render(
				'sil21AdminBundle:Category:show.html.twig', [
					'category'    => $category,
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Displays a form to edit an existing category entity.
		 *
		 */
		public function editAction( Request $request, Category $category ) {
			$deleteForm = $this->createDeleteForm( $category );
			$editForm = $this->createForm( 'sil21\VitrineBundle\Form\CategoryType', $category );
			$editForm->handleRequest( $request );
			
			if ( $editForm->isSubmitted() && $editForm->isValid() ) {
				$this->getDoctrine()->getManager()->flush();
				
				return $this->redirectToRoute( 'category_edit', [ 'id' => $category->getId() ] );
			}
			
			return $this->render(
				'sil21AdminBundle:Category:edit.html.twig', [
					'category'    => $category,
					'edit_form'   => $editForm->createView(),
					'delete_form' => $deleteForm->createView(),
				]
			);
		}
		
		/**
		 * Deletes a category entity.
		 *
		 */
		public function deleteAction( Request $request, Category $category ) {
			$form = $this->createDeleteForm( $category );
			$form->handleRequest( $request );
			
			if ( $form->isSubmitted() && $form->isValid() ) {
				$em = $this->getDoctrine()->getManager();
				$em->remove( $category );
				$em->flush( $category );
			}
			
			return $this->redirectToRoute( 'category_index' );
		}
		
		/**
		 * Creates a form to delete a category entity.
		 *
		 * @param Category $category The category entity
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		private function createDeleteForm( Category $category ) {
			return $this->createFormBuilder()
				->setAction(
					$this->generateUrl( 'category_delete', [ 'id' => $category->getId() ] )
				)
				->setMethod( 'DELETE' )
				->getForm();
		}
	}
