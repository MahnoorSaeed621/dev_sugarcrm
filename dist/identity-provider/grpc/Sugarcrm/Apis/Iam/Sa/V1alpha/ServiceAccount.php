<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: apis/iam/sa/v1alpha/sa.proto

namespace Sugarcrm\Apis\Iam\Sa\V1alpha;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * This is the base format used throughout all SDK's and libraries
 * representing an OAuth2 client. This is also the format which we
 * is used by the cloud console to export a created client allowing
 * customers to this JSON file directly with our libraries.
 *
 * Generated from protobuf message <code>sugarcrm.apis.iam.sa.v1alpha.ServiceAccount</code>
 */
class ServiceAccount extends \Google\Protobuf\Internal\Message
{
    /**
     * The client identifier. The format is an SRN and is assigned during
     * service account creation and cannot be changed later on.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_id = 1;</code>
     */
    private $client_id = '';
    /**
     * The client secret. This value is only present in the response when
     * registering a new service account and is generated by the system.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_secret = 2;</code>
     */
    private $client_secret = '';
    /**
     * Name of the service account as shown in the cloud console. This is a
     * short human readable string.
     *
     * Generated from protobuf field <code>string client_name = 3;</code>
     */
    private $client_name = '';
    /**
     * Scope restriction:
     * When scopes are set the client will be restricted to the listed scopes.
     *
     * Generated from protobuf field <code>repeated string scopes = 4;</code>
     */
    private $scopes;

    public function __construct() {
        \GPBMetadata\Apis\Iam\Sa\V1Alpha\Sa::initOnce();
        parent::__construct();
    }

    /**
     * The client identifier. The format is an SRN and is assigned during
     * service account creation and cannot be changed later on.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_id = 1;</code>
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * The client identifier. The format is an SRN and is assigned during
     * service account creation and cannot be changed later on.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setClientId($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_id = $var;

        return $this;
    }

    /**
     * The client secret. This value is only present in the response when
     * registering a new service account and is generated by the system.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_secret = 2;</code>
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * The client secret. This value is only present in the response when
     * registering a new service account and is generated by the system.
     * &#64;OutputOnly
     *
     * Generated from protobuf field <code>string client_secret = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setClientSecret($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_secret = $var;

        return $this;
    }

    /**
     * Name of the service account as shown in the cloud console. This is a
     * short human readable string.
     *
     * Generated from protobuf field <code>string client_name = 3;</code>
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Name of the service account as shown in the cloud console. This is a
     * short human readable string.
     *
     * Generated from protobuf field <code>string client_name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setClientName($var)
    {
        GPBUtil::checkString($var, True);
        $this->client_name = $var;

        return $this;
    }

    /**
     * Scope restriction:
     * When scopes are set the client will be restricted to the listed scopes.
     *
     * Generated from protobuf field <code>repeated string scopes = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Scope restriction:
     * When scopes are set the client will be restricted to the listed scopes.
     *
     * Generated from protobuf field <code>repeated string scopes = 4;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setScopes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->scopes = $arr;

        return $this;
    }

}
