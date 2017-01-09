<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\FileType;
	use Symfony\Component\Form\Extension\Core\Type\PercentType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class ProductType extends AbstractType {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			$builder
				->add( 'name' )
				->add( 'file', FileType::class, [ 'label' => 'Photo', 'required' => false ] )
				->add( 'price', 'money', [ 'scale' => 2, 'grouping' => true ] )
				->add( 'savedAmout', PercentType::class )
				->add( 'stock' )
				->add( 'description' )
				->add( 'category' )
				->add( 'brand' );
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
