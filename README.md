# Hamlut

## The Concept

**Hamlut** proposes a simple idea: compute Hamming distances directly on base64-encoded binary data (such as binary quantized vector embeddings), without first decoding it back to binary. This approach is made efficient by way of lookup tables.

## The Problem

When working with binary feature vectors, we often:

1. Store or transmit them as base64-encoded strings
2. Need to compare their similarity using Hamming distance
3. Traditionally decode them back to binary first, which adds overhead

## The Solution

We can skip the decoding step entirely by:

1. Mapping each base64 character directly to its 6-bit value
2. Using XOR to identify differing bits between corresponding characters
3. Counting the set bits (popcount) in the XOR result to get the Hamming distance

This approach eliminates the decoding overhead and can be faster when doing many comparisons, significantly so when optimized with lookup tables.

## Key Insights

- Each base64 character represents exactly 6 bits
- Operations can be accelerated with base64-specific lookup tables
- We can compute distances on the encoded form without information loss

## When To Use This

This approach is most valuable when:

- You store binary data in base64 format
- You need to compute many distance comparisons
- Performance matters for your application
- The vectors are relatively long

## Implementation Considerations

**While this repository provides a reference implementation, you may adapt the concept to any language or environment.** When implementing:

- Compiled languages will naturally achieve better performance
- Precompute lookup tables where possible
- Consider cache vs. speed tradeoffs in table design
- For maximum performance, use a single 4096-element LUT
- SIMD instructions can further accelerate these operations

## The Takeaway

Rethink your pipeline if you're decoding base64 data just to compare it. Direct computation on the encoded form can offer significant performance benefits with minimal implementation complexity.

Feel free to experiment with this concept in your own environment and language of choice.

## License

MIT