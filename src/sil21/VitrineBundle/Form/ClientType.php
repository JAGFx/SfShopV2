<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistration;
	
	class ClientType extends BaseRegistration {
		/**
		 * {@inheritdoc}
		 */
		public function buildForm( FormBuilderInterface $builder, array $options ) {
			parent::buildForm( $builder, $options );
			
			$builder
				->add( 'name', null, [ 'label' => 'Nom' ] )
				->add( 'firstname', null, [ 'label' => 'Prénom' ] )
				->add( 'address', null, [ 'label' => 'Adresse' ] )
				->add( 'tel', 'integer', [ 'label' => 'Téléphone' ] )
				->add( 'dateBirthday', 'birthday', [ 'label' => 'Date de naissance' ] );
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions( OptionsResolver $resolver ) {
			$resolver->setDefaults( [ 'data_class' => 'sil21\VitrineBundle\Entity\Client' ] );
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix() {
			return 'sil21_vitrinebundle_client';
		}
		
		public function getName() {
			return 'sil21_user_registration';
		}
		
		
	}
