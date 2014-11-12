<?php

class PismaController extends AppController
{

    public $helpers = array('Form');
    public $uses = array('Pisma.Document');

    /*
    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->deny();
        $this->Auth->allow( 'home' );

        $this->API->setOptions( array(
            'passExceptions' => array(
                403 => 'ForbiddenException',
                404 => 'NotFoundException'
            )
        ) );
        $this->api = $this->API->Pisma();
    }
    */

    public function home()
    {

        /*
        $this->set( 'login_redirect_url', $this->Auth->redirectUrl() );
        // TODO

        $user = $this->Auth->user();
        if ( ! empty( $user ) ) {
            $this->set( 'pisma', $this->api->documents_index() );
        }
        */

    }

    public function my()
    {

    }

    public function editor()
    {

        $API = $this->API->Pisma();

        // $forms = $API->getForms();

        $forms = array(
            array(
                'id' => '1',
                'tytul' => 'Wniosek o udostępnienie informacji publicznej',
                'opis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur aliquam arcu, non placerat justo placerat sed. Cras lacinia enim sit amet risus tincidunt, eget auctor ligula venenatis. Sed porttitor urna in egestas vestibulum. Nulla a dictum magna, id laoreet tellus.',
            ),
            array(
                'id' => '2',
                'tytul' => 'Wniosek o wyznaczenie terminu egzaminu powtórkowego',
                'opis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer efficitur aliquam arcu, non placerat justo placerat sed. Cras lacinia enim sit amet risus tincidunt, eget auctor ligula venenatis. Sed porttitor urna in egestas vestibulum. Nulla a dictum magna, id laoreet tellus.',
            ),
        );

        $this->set('forms', $forms);

    }

    /**
     * Saves sent data
     */
    public function add()
    {
        if ($doc = $this->saveForm($this->request->data)) {
            $this->redirect(array('action' => 'edit', 'id' => $doc['id']));
        }
    }

    private function saveForm($data)
    {
        try {
            $doc = $this->api->document_save($data);

        } catch (MP\ApiValidationException $ex) {

            // TODO nie widać flash w layoucie
            $this->Session->setFlash('Wystąpiły błędy walidacji', null, array('class' => 'alert-error'));
            $this->set('verr', $ex->getValidationErrors());
            $this->set('doc', $data);
            $this->render('edit');

            return null;
        }

        if (isset($data['saveAndSend'])) {
            $this->api->document_send($doc['id']);
        }

        return $doc;
    }

    /**
     * Show form for new Document
     */
    public function create()
    {
        // set defaults
        $doc = array(
            'from_name' => $this->Auth->user('username'),
            'from_email' => $this->Auth->user('email')
        );

        if (isset($this->request->query['template_id'])) {
            // TODO fill template
        }

        $this->set('doc', $doc);

        $this->render('edit');
    }

    public function edit($id)
    {
        if ($this->request->is('get')) {
            $doc = $this->api->document_get($id);
            $this->set('doc', $doc);

        } else {
            $data = $this->request->data;
            $data['id'] = $id;

            if ($doc = $this->saveForm($data)) {
                $this->set('doc', $doc);
            }
        }
    }

    public function delete($id)
    {
        // TODO czy jesteś pewien, if is('get')
        $this->api->document_delete($id);
        $this->Session->setFlash('Skasowano pismo');

        $this->redirect(array('action' => 'home', '[method]' => 'GET'));
    }
}