pragma solidity ^0.8.0;

contract LandRegistry {
    struct Property {
        string id;
        address owner;
        string details;
        uint256 timestamp;
        bool exists;
    }

    mapping(string => Property) public properties;
    event PropertyRegistered(string indexed id, address indexed owner, string details, uint256 timestamp);

    function registerProperty(string memory _id, string memory _details) public {
        require(!properties[_id].exists, "Property already registered");
        properties[_id] = Property(_id, msg.sender, _details, block.timestamp, true);
        emit PropertyRegistered(_id, msg.sender, _details, block.timestamp);
    }

    function transferOwnership(string memory _id, address _newOwner) public {
        require(properties[_id].exists, "Property does not exist");
        require(properties[_id].owner == msg.sender, "Not the owner");
        properties[_id].owner = _newOwner;
    }

    function getProperty(string memory _id) public view returns (string memory, address, string memory, uint256) {
        require(properties[_id].exists, "Property does not exist");
        Property memory p = properties[_id];
        return (p.id, p.owner, p.details, p.timestamp);
    }
}