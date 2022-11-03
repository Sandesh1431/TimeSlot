<?php
namespace Codilar\Project\Api;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Codilar\Project\Api\Data\SlotInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
interface SlotRepositoryInterface
{
    /**
     * Create or update a Slot.
     *
     * @param SlotInterface $Slot
     * @return SlotInterface
     */
    public function save(SlotInterface $Slot);

    /** 
     * Get a Slot by Id
     *
     * @param int $id
     * @return SlotInterface
     * @throws NoSuchEntityException If Slot with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Slots which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Slot
     *
     * @param SlotInterface $Slot
     * @return SlotInterface
     * @throws NoSuchEntityException If Slot with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function delete(SlotInterface $Slot);

    /**
     * Delete a Slot by Id
     *
     * @param int $id
     * @return SlotInterface
     * @throws NoSuchEntityException If Slot with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function deleteById($id);
 
}