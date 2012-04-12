<?php
/**
 * @category OAuth2
 * @package  OAuth2
 */
class OAuth2_MongoServer extends OAuth2_Server
{
    /**
     *
     * @var OAuth2_StorageMongo
     */
    protected $storage;
    public function __construct(OAuth2_StorageMongo $db)
    {
        parent::__construct($db);
    }

    /**
     *
     * @param unknown_type $client_id
     * @param unknown_type $client_secret
     * @param unknown_type $redirect_uri
     */
    public function addClient($client_id, $client_secret, $redirect_uri){
        $this->storage->addClient($client_id, $client_secret, $redirect_uri);
    }
    /**
     *
     * @see OAuth2_Server::grantAccessToken()
     */
    public function grantAccessToken($input = null, $authHeaders = null)
    {
        $data = parent::grantAccessToken($input, $authHeaders);
        $data['refresh_token'] = $data['_id'];
        unset($data['_id']);
        return $data;
    }
}