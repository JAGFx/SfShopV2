<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use sil21\VitrineBundle\Entity\Commande;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class CommandeType extends AbstractType {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			$builder
				->add(
					'date', null, [
						'label'    => 'Date d\'enregistrment',
						'disabled' => true,
					]
				)
				->add(
					'etat', ChoiceType::class, [
						'label'   => 'Etat',
						'choices' => Commande::getStatesConstants()
					]
				)
				->add( 'client', null, [ 'disabled' => true ] );
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions( OptionsResolver $resolver ) {
			$resolver->setDefaults(
				[
					'data_class' => 'sil21\VitrineBundle\Entity\Commande'
				]
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix() {
			return 'sil21_vitrinebundle_commande';
		}
		
		
	}
