// https://leetcode.com/problems/lru-cache/

/*
Design and implement a data structure for Least Recently Used (LRU) cache. It should support the following operations: get and put.

get(key) - Get the value (will always be positive) of the key if the key exists in the cache, otherwise return -1.
put(key, value) - Set or insert the value if the key is not already present. When the cache reached its capacity, it should invalidate the least recently used item before inserting a new item.

The cache is initialized with a positive capacity.

Follow up:
Could you do both operations in O(1) time complexity?

Example:

LRUCache cache = new LRUCache( 2 ); //capacity

cache.put(1, 1);
cache.put(2, 2);
cache.get(1);       // returns 1
cache.put(3, 3);    // evicts key 2
cache.get(2);       // returns -1 (not found)
cache.put(4, 4);    // evicts key 1
cache.get(1);       // returns -1 (not found)
cache.get(3);       // returns 3
cache.get(4);       // returns 4
*/

class LRUCache {

    private int capacity;

    static class Node {
        int key;
        int value;
        Node prev;
        Node next;

        Node(int key, int value) { this.key = key; this.value = value; }
    }

    private Map<Integer, Node> cache = new HashMap<>();
    private Node head;
    private Node tail;
    
    public LRUCache(int capacity) {
        this.capacity = capacity;
    }
    
    public int get(int key) {
        if (cache.containsKey(key)) {
            Node node = cache.get(key);

            if (node.equals(head)) {
                return head.value;
            }

            if (node.prev != null) {
                node.prev.next = node.next;
                if (node.next != null) {
                    node.next.prev = node.prev;
                }
            }
            if (node.next == null) {
                tail = node.prev;
            }
            node.prev = null;
            node.next = head;
            head.prev = node;
            head = node;

            return head.value;
        }
        return -1;
    }
    
    public void put(int key, int value) {
        if (cache.isEmpty()) {
            Node node = new Node(key, value);
            head = tail = node;
            cache.put(key, node);
        } else if (cache.containsKey(key)) {
            Node node = cache.get(key);
            node.value = value;

            if (node.prev != null) {
                node.prev.next = node.next;
                if (node.next != null) {
                    node.next.prev = node.prev;
                }
            }
            if (node.next == null && node.prev != null) {
                tail = node.prev;
            }
            if (node.prev != null) {
                node.prev = null;
                node.next = head;
                head.prev = node;
                head = node;
            }

        } else if (cache.size() == capacity) {

            Node node = cache.get(tail.key);
            cache.remove(tail.key);

            if (node.prev != null) {
                tail = node.prev;
                tail.next = null;
            }

            node = new Node(key, value);
            node.prev = null;
            node.next = head;
            head.prev = node;
            head = node;

            cache.put(key, node);
        } else {
            Node node = new Node(key, value);
            node.prev = null;
            node.next = head;
            head.prev = node;
            head = node;

            cache.put(key, node);
        }
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * LRUCache obj = new LRUCache(capacity);
 * int param_1 = obj.get(key);
 * obj.put(key,value);
 */