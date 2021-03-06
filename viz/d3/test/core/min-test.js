require("../env");
require("../../d3");

var vows = require("vows"),
    assert = require("assert");

var suite = vows.describe("d3.min");

suite.addBatch({
  "min": {
    topic: function() {
      return d3.min;
    },
    "returns the least numeric value for numbers": function(min) {
      assert.equal(min([1]), 1);
      assert.equal(min([5, 1, 2, 3, 4]), 1);
      assert.equal(min([20, 3]), 3);
      assert.equal(min([3, 20]), 3);
    },
    "returns the least lexicographic value for strings": function(min) {
      assert.equal(min(["c", "a", "b"]), "a");
      assert.equal(min(["20", "3"]), "20");
      assert.equal(min(["3", "20"]), "20");
    },
    "ignores null, undefined and NaN": function(min) {
      assert.equal(min([NaN, 1, 2, 3, 4, 5]), 1);
      assert.equal(min([1, 2, 3, 4, 5, NaN]), 1);
      assert.equal(min([10, null, 3, undefined, 5, NaN]), 3);
    },
    "compares heterogenous types as numbers": function(min) {
      assert.strictEqual(min([20, "3"]), "3");
      assert.strictEqual(min(["20", 3]), 3);
      assert.strictEqual(min([3, "20"]), 3);
      assert.strictEqual(min(["3", 20]), "3");
    },
    "returns undefined for empty array": function(min) {
      assert.isUndefined(min([]));
      assert.isUndefined(min([null]));
      assert.isUndefined(min([undefined]));
      assert.isUndefined(min([NaN]));
      assert.isUndefined(min([NaN, NaN]));
    },
    "applies the optional accessor function": function(min) {
      assert.equal(d3.min([[1, 2, 3, 4, 5], [2, 4, 6, 8, 10]], function(d) { return d3.max(d); }), 5);
      assert.equal(d3.min([1, 2, 3, 4, 5], function(d, i) { return i; }), 0);
    }
  }
});

suite.export(module);
