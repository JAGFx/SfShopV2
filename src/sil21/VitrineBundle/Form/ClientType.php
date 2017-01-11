<?php
	
	namespace sil21\VitrineBundle\Form;
	
	use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
	use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
				->add(
					'name', null,
					[ 'label' => 'client.name', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'firstname', null,
					[ 'label' => 'client.firstname', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'address', null,
					[ 'label' => 'client.address', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'tel', IntegerType::class,
					[ 'label' => 'client.tel', 'translation_domain' => 'AdminBundle' ]
				)
				->add(
					'dateBirthday', BirthdayType::class,
					[ 'label' => 'client.birthday', 'translation_domain' => 'AdminBundle' ]
				);
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
