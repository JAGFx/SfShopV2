<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use sil21\VitrineBundle\Entity\Order;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class OrderType extends AbstractType {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			$builder
				->add(
					'date', null, [
						'label'              => 'order.date',
						'disabled'           => true,
						'translation_domain' => 'AdminBundle'
					]
				)
				->add(
					'etat', ChoiceType::class, [
						'label'              => 'order.etat',
						'choices'            => Order::getStatesConstants(),
						'translation_domain' => 'AdminBundle'
					]
				)
				->add( 'client', null, [
					'label'              => 'order.client',
					'disabled'           => true,
					'translation_domain' => 'AdminBundle'
				]
				);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions( OptionsResolver $resolver ) {
			$resolver->setDefaults(
				[
					'data_class' => 'sil21\VitrineBundle\Entity\Order'
				]
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix() {
			return 'sil21_vitrinebundle_order';
		}
		
		
	}
