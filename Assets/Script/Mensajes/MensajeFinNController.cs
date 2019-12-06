using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MensajeFinNController : MonoBehaviour
{
    public float tiempovida = 2;
    public int orderInLayer = 0;
    private MeshRenderer mr;
    void Start()
    {
        mr = GetComponent<MeshRenderer>();
    }

    // Update is called once per frame
    void Update()
    {
        mr.sortingOrder = orderInLayer;
        tiempovida -= Time.deltaTime;
        if(tiempovida <= 0)
        {
            Destroy(this.gameObject);
        }
    }
}
