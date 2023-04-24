<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/common/segments.proto

namespace Google\Ads\GoogleAds\V12\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A BudgetCampaignAssociationStatus segment.
 *
 * Generated from protobuf message <code>google.ads.googleads.v12.common.BudgetCampaignAssociationStatus</code>
 */
class BudgetCampaignAssociationStatus extends \Google\Protobuf\Internal\Message
{
    /**
     * The campaign resource name.
     *
     * Generated from protobuf field <code>optional string campaign = 1;</code>
     */
    protected $campaign = null;
    /**
     * Budget campaign association status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.BudgetCampaignAssociationStatusEnum.BudgetCampaignAssociationStatus status = 2;</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $campaign
     *           The campaign resource name.
     *     @type int $status
     *           Budget campaign association status.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V12\Common\Segments::initOnce();
        parent::__construct($data);
    }

    /**
     * The campaign resource name.
     *
     * Generated from protobuf field <code>optional string campaign = 1;</code>
     * @return string
     */
    public function getCampaign()
    {
        return isset($this->campaign) ? $this->campaign : '';
    }

    public function hasCampaign()
    {
        return isset($this->campaign);
    }

    public function clearCampaign()
    {
        unset($this->campaign);
    }

    /**
     * The campaign resource name.
     *
     * Generated from protobuf field <code>optional string campaign = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->campaign = $var;

        return $this;
    }

    /**
     * Budget campaign association status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.BudgetCampaignAssociationStatusEnum.BudgetCampaignAssociationStatus status = 2;</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Budget campaign association status.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.BudgetCampaignAssociationStatusEnum.BudgetCampaignAssociationStatus status = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V12\Enums\BudgetCampaignAssociationStatusEnum\BudgetCampaignAssociationStatus::class);
        $this->status = $var;

        return $this;
    }

}

