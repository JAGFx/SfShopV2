<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\FileType;
	use Symfony\Component\Form\Extension\Core\Type\MoneyType;
	use Symfony\Component\Form\Extension\Core\Type\PercentType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Vich\UploaderBundle\Form\Type\VichImageType;
	
	class ProductType extends AbstractType {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			$builder
				->add(
					'name', null,
					[ 'label' => 'product.name', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'image', VichImageType::class, [
						       'required'           => false,
						       'allow_delete'       => true,
						       'download_link'      => false,
						       'label'              => 'product.file',
						       'translation_domain' => 'AdminBundle'
					]
				)
				->add(
					'price', MoneyType::class,
					[
						'scale'              => 2,
						'grouping'           => true,
						'label'              => 'product.price',
						'translation_domain' => 'AdminBundle'
					]
				)
				->add(
					'savedAmount', PercentType::class,
					[ 'label' => 'product.saved_amount', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'stock', null,
					[ 'label' => 'product.stock', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'description', null,
					[ 'label' => 'product.description', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'category', null,
					[ 'label' => 'product.category', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'brand', null,
					[ 'label' => 'product.brand', 'translation_domain' => 'AdminBundle' ]
				);
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
