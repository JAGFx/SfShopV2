<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class ProductType extends AbstractType {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			$builder->add( 'name' )->add( 'image' )->add( 'price' )->add( 'stock' )->add(
				'description'
			)->add( 'category' )->add( 'marque' );
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions( OptionsResolver $resolver ) {
			$resolver->setDefaults(
				[
					'data_class' => 'sil21\VitrineBundle\Entity\Product'
				]
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix() {
			return 'sil21_vitrinebundle_product';
		}
		
		
	}
